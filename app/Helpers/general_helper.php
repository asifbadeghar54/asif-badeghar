<?php

if (!function_exists('dataTableQueryParams')) {
    /**
     * Extracts search, orderBy, limit, and offset from DataTables POST/GET request.
     * @param array $request Usually $this->request->getVar()
     * @param array $searchableColumns Columns to search in (for LIKE)
     * @return array ['where' => ..., 'orderBy' => ..., 'offset' => ..., 'limit' => ...]
     */
    function dataTableQueryParams(array $request)
    {
        $columns = $request['columns'] ?? [];
        $order = $request['order'][0] ?? [];
        $search = $request['search']['value'] ?? '';
        $start = isset($request['start']) ? (int)$request['start'] : 0;
        $length = isset($request['length']) ? (int)$request['length'] : null;

        // Build orderBy
        $orderBy = [];
        if (!empty($order) && isset($columns[$order['column']]['data'])) {
            $orderBy = [$columns[$order['column']]['data'] => $order['dir']];
        }

        // Build search WHERE (LIKE for all columns)
        $where = [];
        if ($search && $columns) {
            $likeParts = [];
            foreach ($columns as $col) {
                if (!empty($col['data'])) {
                    $likeParts[] = "{$col['data']} LIKE '%" . addslashes($search) . "%'";
                }
            }
            if ($likeParts) {
                $where = '(' . implode(' OR ', $likeParts) . ')';
            }
        }

        return [
            'where' => $where,
            'orderBy' => $orderBy,
            'offset' => $start,
            'limit' => $length,
        ];
    }
}

if (!function_exists('getSessionsValue')) {
    /**
     * Generates a unique referral code.
     *
     * @return string
     */
    function getSessionsValue($value = "")
    {
        $data = session()->get($value);
        return $data;
    }
}

if (!function_exists('user_id')) {
    /**
     * Generates a unique referral code.
     *
     * @return string
     */
    function user_id($value = "")
    {
        $data = session()->get('user_id');
        return $data;
    }
}

if (!function_exists('commonCheckedDeleteRows')) {
    function commonCheckedDeleteRows($tableId, $deleteUrl, $message = 'You will not be able to recover this data!')
    {
        $deleteUrl = base_url($deleteUrl);
        $tableId = '#' . $tableId;
        return <<<EOT
    $('$tableId thead').on('click', '.select-all', function() {
        var checked = this.checked;
        $('$tableId tbody input.chk-box').each(function() {
            $(this).prop('checked', checked);
        });
        toggleDeleteButton();
    });

    $('$tableId tbody').on('click', '.chk-box', function() {
        if (!this.checked) {
            $('.select-all').prop('checked', false);
        } else {
            if ($('$tableId tbody input.chk-box:checked').length === $('$tableId tbody input.chk-box').length) {
                $('.select-all').prop('checked', true);
            }
        }
    });

    $('#delete-selected').prop('disabled', true);
    $('$tableId thead').on('click', '.select-all', function() {
        var checked = this.checked;
        $('$tableId tbody input.chk-box').each(function() {
            $(this).prop('checked', checked);
        });
        toggleDeleteButton();
    });

    $('$tableId tbody').on('click', '.chk-box', function() {
        toggleDeleteButton();
    });

    function toggleDeleteButton() {
        var anyChecked = $('$tableId tbody input.chk-box:checked').length > 0;
        $('#delete-selected').prop('disabled', !anyChecked);
    }

    $('#delete-selected').click(function() {
        var selectedIds = [];
        $('$tableId tbody input.chk-box:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length === 0) {
            alert('No Testimonials selected');
            return;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover this $message',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Perform the AJAX call to delete the record
                $.ajax({
                    url: '$deleteUrl',
                    type: 'POST',
                    data: {
                        selectedIds: selectedIds
                    },
                    success: function(response) {
                        if (response) {
                            Swal.fire(
                                'Deleted!',
                                '$message has been deleted.',
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                'There was a problem deleting the file.',
                                'error'
                            );
                        }
                    },
                    error: function() {
                        Swal.fire(
                            'Error!',
                            'There was a problem deleting the file.',
                            'error'
                        );
                    }
                });
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Cancelled',
                    '$message are safe :)',
                    'error'
                );
            }
        });
    });
EOT;
    }
}



if (!function_exists('confirmAlertPopUp')) {
    function confirmAlertPopUp($url)
    {
        $url = base_url($url);
        return <<<EOT
<script>
function confirmAlertPopUp(id,type,message,text1,text) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '{$url}',
                type: 'POST',
                data: {
                    id: id,
                    type:type
                },
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            text,
                            text1,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'Something went wrong',
                            'error'
                        );
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Something went wrong',
                        'error'
                    );
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Record Not Updated',
                'error'
            );
        }
    });
}
</script>
EOT;
    }
}

if (!function_exists('twoButtonConfirmAlert')) {
    function twoButtonConfirmAlert()
    {

        // $url = base_url($url);
        return <<<EOT
<script>
function twoButtonConfirmAlert(url,data,message,alertType,successMessage) {
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response) {
                        Swal.fire(
                            alertType,
                            successMessage,
                            'success'
                        ).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire(
                            'Error!',
                            'Something went wrong',
                            'error'
                        );
                    }
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Something went wrong',
                        'error'
                    );
                }
            });
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            Swal.fire(
                'Cancelled',
                'Record Not Updated',
                'error'
            );
        }
    });
}
</script>
EOT;
    }
}
