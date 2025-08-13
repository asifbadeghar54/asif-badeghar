var userSettings = {
    Layout: "vertical", // vertical | horizontal
    SidebarType: "full", // full | mini-sidebar
    BoxedLayout: true, // true | false
    Direction: "ltr", // ltr | rtl
    Theme: "light", // light | dark
    ColorTheme: "Blue_Theme", // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
    cardBorder: false, // true | false
};

function showMessage(type, message) {
    Swal.fire({
        icon: type,
        title: type === 'error' ? 'Error!' : 'Success',
        text: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        position: 'top-end',
        toast: true,
    });
}

function appAlert(message, response) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
    }).then((result) => {
        if (response) {
            response(result);
        }
    });
}

function utcToLocal(utcString, format = 'YYYY-MM-DD HH:mm:ss') {
    const utcDate = new Date(utcString + ' UTC');
    const pad = n => n < 10 ? '0' + n : n;
    return format
        .replace('YYYY', utcDate.getFullYear())
        .replace('MM', pad(utcDate.getMonth() + 1))
        .replace('DD', pad(utcDate.getDate()))
        .replace('HH', pad(utcDate.getHours()))
        .replace('mm', pad(utcDate.getMinutes()))
        .replace('ss', pad(utcDate.getSeconds()));
}

function dateDiff(date1, date2) {
    let d1 = (date1 instanceof Date) ? date1 : new Date(date1);
    let d2 = (date2 instanceof Date) ? date2 : new Date(date2);
    let diff = Math.floor((d2 - d1) / 1000);
    let absDiff = Math.abs(diff);
    return {
        totalSeconds: diff,
        hours: Math.floor(absDiff / 3600),
        minutes: Math.floor((absDiff % 3600) / 60),
        seconds: absDiff % 60
    };
}

function autoResize(element) {
    element.style.height = 'auto';
    element.style.height = (element.scrollHeight) + 'px';
}

function initializeAjaxSelect($selectElement) {

    const $select = $($selectElement);
    const endpoint = $select.data('endpoint');
    const valueField = $select.data('field-value') || 'id';
    const labelField = $select.data('field-label') || 'text';
    const placeholder = $select.data('placeholder') || 'Select Option';
    const templateName = $select.data('template'); // Optional
    const initialValue = $select.data('initial-value'); // Optional JSON
    const initialLabel = $select.data('initial-label');

    // Optional: get template function from global scope if defined
    let customTemplate = window[templateName] || null;

    // 🧠 Collect all data-filter-* attributes
    const filterAttributes = {};
    
    $.each($selectElement.attributes, function () {
        if (this.name.startsWith('data-filter-')) {
            const key = this.name.replace('data-filter-', '');
            filterAttributes[key] = this.value;
        }
    });

    $select.select2({
        placeholder,
        escapeMarkup: markup => markup, // allow HTML
        ajax: {
            url: `${base_url}dropdown/${endpoint}`,
            dataType: 'json',
            delay: 250,
            data: function (params) {
                const ajaxData = {
                    search: params.term,
                    page: params.page || 1
                };

                if (filterAttributes && Object.keys(filterAttributes).length > 0) {
                    // 🔁 Inject each dynamic filter
                    Object.entries(filterAttributes).forEach(([key, selector]) => {
                        const value = $(selector).val();
                        if (value) {
                            ajaxData[key] = value;
                        }
                    });
                }
                return ajaxData;
            },
            processResults: function (data) {
                return {
                    results: data.map(item => ({
                        id: item[valueField],
                        text: item[labelField],
                        ...item
                    }))
                };
            },
            cache: true
        },
        templateResult: function (data) {
            if (data.loading) return data.text;
            return customTemplate ? customTemplate(data) : data.text;
        },
        templateSelection: function (data) {
            return customTemplate ? customTemplate(data) : data.text;
        }
    });

    // Handle default selected option (only if passed in data-default)
    if (initialValue && initialLabel) {
        const option = new Option(initialLabel, initialValue, true, true);
        $select.append(option).trigger('change');
    }
}

function initAutocompleteInputs(element) {
    const $input = $(element);
    const endpoint = $input.data('endpoint');
    const labelField = $input.data('label-field') || 'label';
    const valueField = $input.data('value-field') || 'id';
    const targetSelector = $input.data('target'); // Optional hidden field to store ID

    $input.autocomplete({
        minLength: 1,
        delay: 300,
        source: function (request, response) {
            $.ajax({
                url: `${base_url}dropdown/${endpoint}`,
                dataType: 'json',
                data: {
                    term: request.term
                },
                success: function (data) {
                    const results = data.map(item => ({
                        label: item[labelField],
                        value: item[labelField],
                        id: item[valueField]
                    }));
                    response(results);
                }
            });
        },
        select: function (event, ui) {
            if (targetSelector) {
                $(targetSelector).val(ui.item.id);
            }
        },
        change: function (event, ui) {
            if (!ui.item) {
                if (targetSelector) {
                    $(targetSelector).val('');
                }
            }
        }
    });
}

$(document).ready(function () {
    $('textarea').each(function () {
        $(this).val($(this).val().trim());
    });
    $('.select2-ajax').each(function () {
        initializeAjaxSelect(this);
    });
    $('.autocomplete-input').each(function () {
        initAutocompleteInputs(this);
    })
})