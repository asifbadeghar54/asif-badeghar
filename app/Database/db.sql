--
-- Database: `yamujsje_bijapur_hardwares`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(11) NOT NULL,
  `user_role` varchar(30) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_password_hash` varchar(100) DEFAULT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`user_id`, `user_role`, `user_name`, `user_email`, `user_password`, `user_password_hash`, `user_created_at`, `user_updated_at`, `user_deleted`) VALUES
(1, '1', 'admin', 'admin@masterbusiness.com', '123456', NULL, NULL, NULL, 0);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `users`
  MODIFY `user_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

-- Companies table
CREATE TABLE companies (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(100) NOT NULL,
    company_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    company_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    company_deleted TINYINT NOT NULL DEFAULT '0'
);

-- Product categories (pipes, taps, showers, etc.)
-- CREATE TABLE categories (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(100) NOT NULL
-- );

-- Product types (e.g., L-pipe, T-pipe, elbow for pipe; wall mount, pillar tap etc.)
-- CREATE TABLE product_types (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     category_id INT NOT NULL,
--     name VARCHAR(100) NOT NULL,
--     FOREIGN KEY (category_id) REFERENCES categories(id)
-- );
CREATE TABLE categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    category_parent_id INT DEFAULT NULL,
    category_has_size BOOLEAN DEFAULT FALSE,
    category_deleted TINYINT NOT NULL DEFAULT '0',
    FOREIGN KEY (category_parent_id) REFERENCES categories(category_id) ON DELETE SET NULL
);

-- Sizes table (optional for products like pipes that have sizes)
CREATE TABLE sizes (
    size_id INT AUTO_INCREMENT PRIMARY KEY,
    size_label VARCHAR(50) NOT NULL
);

-- Products
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_company_id INT DEFAULT NULL,
    product_category_id INT DEFAULT NULL,
    product_size VARCHAR(50) DEFAULT NULL,
    product_price DECIMAL(10,2) DEFAULT NULL,
    product_description TEXT DEFAULT NULL,
    product_deleted TINYINT NOT NULL DEFAULT '0',
    product_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    product_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (product_category_id) REFERENCES categories(category_id)
);

-- Quotations table (master)
CREATE TABLE quotations (
    quotation_id INT AUTO_INCREMENT PRIMARY KEY,
    quotation_customer_name VARCHAR(100),
    quotation_customer_number VARCHAR(13) NULL DEFAULT NULL,
    quotation_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    quotation_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    quotation_deleted TINYINT NOT NULL DEFAULT '0',
    quotation_amount VARCHAR(20) NOT NULL DEFAULT '0.00',
    quotation_company_id INT DEFAULT NULL,
    quotation_date DATE NULL DEFAULT NULL,
    FOREIGN KEY (quotation_company_id) REFERENCES companies(company_id)
);

-- Quotation items table (child)
CREATE TABLE quotation_items (
    quotation_item_id INT AUTO_INCREMENT PRIMARY KEY,
    quotation_item_quotation_id INT NOT NULL,
    quotation_item_product_id INT NOT NULL,
    quotation_item_product_name VARCHAR(255),
    quotation_item_quantity INT NOT NULL,
    quotation_item_rate DECIMAL(10,2) NOT NULL,
    quotation_item_amount DECIMAL(10,2) NOT NULL,

    FOREIGN KEY (quotation_item_quotation_id) REFERENCES quotations(quotation_id) ON DELETE CASCADE,
    FOREIGN KEY (quotation_item_product_id) REFERENCES products(product_id)
);

-- 01-08-2025
ALTER TABLE `products` CHANGE `product_company_name` `product_company_id` INT DEFAULT NULL;

ALTER TABLE `companies` ADD `company_deleted` TINYINT NOT NULL DEFAULT '0' AFTER `company_updated_at`;
ALTER TABLE `categories` ADD `category_deleted` TINYINT NOT NULL DEFAULT '0' AFTER `category_has_size`;
ALTER TABLE `quotations` ADD `quotation_customer_number` VARCHAR(13) NULL DEFAULT NULL AFTER `quotation_updated_at`;
ALTER TABLE `quotations` ADD `quotation_deleted` TINYINT NOT NULL DEFAULT '0' AFTER `quotation_customer_number`;
ALTER TABLE `products` ADD `product_deleted` TINYINT NOT NULL DEFAULT '0' AFTER `product_updated_at`;

-- 05-08-2025
ALTER TABLE `quotations` ADD `quotation_amount` DECIMAL(10,2) NOT NULL DEFAULT '0' AFTER `quotation_deleted`, ADD `quotation_company_id` INT NULL DEFAULT NULL AFTER `quotation_amount`;
ALTER TABLE `quotations` ADD `quotation_date` DATE NULL DEFAULT NULL AFTER `quotation_company_id`;
ALTER TABLE `quotations` MODIFY COLUMN `quotation_amount` VARCHAR(20) NOT NULL DEFAULT '0.00';

INSERT INTO `products` (`product_id`, `product_name`, `product_company_id`, `product_category_id`, `product_size`, `product_price`, `product_unit`, `product_description`, `product_created_at`, `product_updated_at`, `product_deleted`) VALUES
-- PVC Products
(1, 'PVC Elbow 90°', 1, 1, '1 inch', 12.50, 'pcs', 'Durable 90-degree elbow for PVC piping.', NOW(), NOW(), 0),
(2, 'PVC Tee Connector', 1, 1, '3/4 inch', 15.75, 'pcs', 'Tee joint connector for branching pipes.', NOW(), NOW(), 0),
(3, 'PVC Coupling Socket', 2, 1, '2 inch', 18.00, 'pcs', 'Socket joint coupling for PVC pipes.', NOW(), NOW(), 0),
(4, 'PVC Pipe 3m', 1, 1, '3 inch', 240.00, 'length', 'Standard 3-meter PVC pipe.', NOW(), NOW(), 0),
(5, 'PVC End Cap', 2, 1, '1 inch', 7.25, 'pcs', 'Cap for sealing ends of PVC pipes.', NOW(), NOW(), 0),

-- CPVC Products
(6, 'CPVC Elbow 45°', 1, 2, '1/2 inch', 10.00, 'pcs', 'CPVC 45-degree bend for hot water systems.', NOW(), NOW(), 0),
(7, 'CPVC Tee Connector', 2, 2, '1 inch', 19.50, 'pcs', 'Tee for hot water CPVC piping.', NOW(), NOW(), 0),
(8, 'CPVC Reducer Coupler', 1, 2, '3/4 to 1/2 inch', 12.00, 'pcs', 'Coupler to reduce pipe diameter.', NOW(), NOW(), 0),
(9, 'CPVC Pipe 5m', 2, 2, '1.5 inch', 360.00, 'length', 'Hot water CPVC pipe of 5 meters.', NOW(), NOW(), 0),
(10, 'CPVC Union Joint', 1, 2, '1 inch', 22.50, 'pcs', 'Easy detachable CPVC joint.', NOW(), NOW(), 0),

-- UPVC Products
(11, 'UPVC Ball Valve', 1, 3, '1.25 inch', 145.00, 'pcs', 'Heavy-duty UPVC ball valve.', NOW(), NOW(), 0),
(12, 'UPVC Pipe 6m', 2, 3, '2 inch', 510.00, 'length', 'UPVC pipe 6 meters long.', NOW(), NOW(), 0),
(13, 'UPVC Elbow 90°', 1, 3, '3 inch', 42.00, 'pcs', 'Elbow joint for UPVC pipe.', NOW(), NOW(), 0),
(14, 'UPVC Tee 3-Way', 2, 3, '1.5 inch', 39.50, 'pcs', '3-way tee fitting for UPVC plumbing.', NOW(), NOW(), 0),
(15, 'UPVC End Plug', 1, 3, '2 inch', 11.75, 'pcs', 'Plug end for sealing UPVC line.', NOW(), NOW(), 0),

-- Mixed Accessories
(16, 'Thread Seal Tape', NULL, 1, NULL, 5.00, 'roll', 'Teflon tape for sealing threads.', NOW(), NOW(), 0),
(17, 'Pipe Clamp', NULL, 1, '1 inch', 8.50, 'pcs', 'Metal clamp for securing pipes.', NOW(), NOW(), 0),
(18, 'Wall Hanger Clip', NULL, 1, '3/4 inch', 3.75, 'pcs', 'Plastic clip for pipe support.', NOW(), NOW(), 0),
(19, 'PVC Solvent Cement', 1, 1, '100ml', 45.00, 'bottle', 'Cement for joining PVC pipes.', NOW(), NOW(), 0),
(20, 'CPVC Solvent Cement', 2, 2, '50ml', 38.00, 'bottle', 'Special adhesive for CPVC fittings.', NOW(), NOW(), 0);

ALTER TABLE `products` CHANGE `product_id` `product_id` INT(11) NOT NULL AUTO_INCREMENT, CHANGE `product_category_id` `product_category_id` INT(11) NULL DEFAULT NULL, CHANGE `product_price` `product_price` DECIMAL(10,2) NULL DEFAULT NULL, CHANGE `product_created_at` `product_created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP, CHANGE `product_updated_at` `product_updated_at` DATETIME on update CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE pricing (
    pricing_id INT AUTO_INCREMENT PRIMARY KEY,
    pricing_product_id INT NOT NULL,
    pricing_company_id INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    pricing_created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    pricing_updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (pricing_product_id) REFERENCES products(product_id),
    FOREIGN KEY (pricing_company_id) REFERENCES companies(company_id)
);

CREATE INDEX idx_pricing_product_company ON pricing (pricing_product_id, pricing_company_id);
CREATE INDEX idx_product_search ON products (product_deleted, product_name);