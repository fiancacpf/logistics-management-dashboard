<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::unprepared(<<<'SQL'
        INSERT INTO access_profiles (id, name, description, created_at, updated_at) VALUES
        (1, 'ADMIN', 'Full access to all modules and reports, including strategic indicators. Allows for the approval, viewing, and generation of high-level reports.', '2025-05-13 15:42:03', '2025-06-16 14:55:51'),
        (2, 'Secretary of State', 'Access to comprehensive reports (national and provincial) allows for the monitoring of the performance of directors and departments. Provides a view of strategic data.', '2025-05-13 15:42:03', '2025-05-13 15:42:03'),
        (3, 'Section Head', 'Access to administrative reports, user and permission control, and operational monitoring.', '2025-05-13 15:42:03', '2025-06-16 14:56:14'),
        (4, 'Secretary', 'Manages all modules under their direction. Views, edits, and generates detailed reports. Oversees departments.', '2025-05-13 15:42:03', '2025-06-16 14:57:11'),
        (5, 'Warehouse Clerk', 'Access to your department data and operations. You can edit, view reports, and manage the department team.', '2025-05-13 15:42:03', '2025-06-16 14:57:06');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO batches (id, product_id, supplier_id, warehouse_id, state_id, quantity, batch_number, unit_id, entry_type, expiration_date, entry_date, created_at, updated_at) VALUES
        (1, 1, NULL, 1, 1, 500.00, 'LT001', 1, 'buy', '2050-01-01', NULL, '2025-05-06 20:34:48', '2025-06-20 05:58:30'),
        (2, 3, NULL, 1, 1, 780.00, 'LT002', 1, 'buy', '2050-01-01', NULL, '2025-05-06 20:38:21', '2025-06-20 05:58:30'),
        (3, 4, NULL, 1, 1, 780.00, 'LT003', 2, 'buy', '2050-01-01', NULL, '2025-05-06 20:40:23', '2025-06-20 05:58:36'),
        (4, 5, NULL, 1, 1, 500.00, 'LT003', 2, 'buy', '2025-08-01', NULL, '2025-05-06 20:40:23', '2025-06-20 05:58:14'),
        (5, 2, NULL, 1, 1, 15090.00, 'LT004', 1, 'buy', '2050-01-01', NULL, '2025-05-12 16:13:51', '2025-05-12 16:13:51'),
        (6, 1, NULL, 1, 1, 1000.00, 'LT004', 1, 'buy', '2025-12-20', NULL, '2025-05-12 16:13:51', '2025-05-25 18:43:46'),
        (7, 1, NULL, 2, 1, 19500.00, 'LT005', 1, 'buy', '2050-01-01', NULL, '2025-05-25 18:57:33', '2025-06-20 06:18:17'),
        (8, 2, NULL, 2, 1, 4544.00, 'LT006', 1, 'buy', '2050-01-01', NULL, '2025-05-25 18:57:33', '2025-06-20 06:18:17'),
        (9, 3, NULL, 2, 1, 3789.00, 'LT007', 3, 'buy', '2050-01-01', NULL, '2025-05-25 18:57:33', '2025-05-25 18:57:33'),
        (10, 4, NULL, 2, 1, 644.00, 'LT008', 2, 'buy', '2050-01-01', NULL, '2025-05-25 18:57:33', '2025-06-20 05:26:10'),
        (11, 2, NULL, 2, 1, 30.00, 'LT001', 1, 'buy', '2050-01-01', NULL, '2025-06-16 14:52:08', '2025-06-16 14:52:08'),
        (12, 3, NULL, 2, 1, 100.00, 'LT002', 3, 'buy', '2050-01-01', NULL, '2025-06-16 14:52:08', '2025-06-16 14:52:08'),
        (13, 5, NULL, 2, 1, 100.00, 'LT008', 2, 'buy', '2050-01-01', NULL, '2025-06-16 16:02:07', '2025-06-16 16:02:07'),
        (14, 3, NULL, 1, 1, 500.00, 'LT002', 3, 'buy', '2050-01-01', NULL, '2025-06-17 09:32:00', '2025-06-17 09:32:00'),
        (15, 3, NULL, 2, 2, 12.00, 'LT002', 3, 'buy', '2050-01-01', NULL, '2025-06-25 12:45:08', '2025-06-25 12:45:08');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO beneficiary (id, name, photo, type, gender, dob, bi, nif, telephone, email, id_province, address, created_at, updated_at) VALUES
        (1, 'Carla João', NULL, '1', 'female', '1993-05-19', '002345678LA045', NULL, NULL, NULL, 13, NULL, '2025-05-06 20:41:44', '2025-05-06 20:41:44'),
        (2, 'Abraão Júlio Mateus', NULL, '1', 'male', '1995-09-21', '002345678LA045', NULL, NULL, NULL, 3, NULL, '2025-05-10 19:11:23', '2025-05-10 19:11:23'),
        (3, 'António Vasgo Vinto', NULL, '1', 'male', '2000-03-14', NULL, NULL, NULL, NULL, 3, NULL, '2025-05-10 19:12:15', '2025-05-10 19:12:15'),
        (4, 'Emenegilda Lucas', NULL, '1', 'female', '1988-12-23', NULL, NULL, NULL, NULL, 10, NULL, '2025-05-10 19:12:50', '2025-05-10 19:12:50'),
        (5, 'Miguel Neto Bento', NULL, '1', 'male', '2023-06-13', NULL, NULL, NULL, NULL, 13, NULL, '2025-05-10 20:48:53', '2025-05-10 21:05:59'),
        (6, 'Maura Moinho', NULL, '1', 'female', '2000-01-10', NULL, NULL, NULL, NULL, 3, NULL, '2025-05-10 21:07:00', '2025-05-10 21:07:00'),
        (7, 'LK Dom', NULL, '2', NULL, NULL, NULL, '23456100961234', '990556012', 'lkd@gmail.com', 13, 'Maianga', '2025-05-10 21:08:57', '2025-05-10 21:08:57'),
        (8, 'Pinto Miguel Bunza', NULL, '1', 'male', '1955-01-01', NULL, NULL, NULL, NULL, 3, NULL, '2025-05-12 16:22:07', '2025-05-12 16:22:07'),
        (9, 'Anaís Lukunta Luki', NULL, '1', 'female', '1955-01-01', NULL, NULL, NULL, NULL, 3, NULL, '2025-05-12 16:23:22', '2025-05-12 16:23:54'),
        (10, 'Adelaide Amiro Mendes', NULL, '1', 'female', '1954-01-05', NULL, NULL, NULL, NULL, 3, NULL, '2025-05-12 16:25:04', '2025-05-12 16:25:04'),
        (11, 'Vasco Tchipanga Vinho Junto', NULL, '1', 'male', '1975-02-05', NULL, NULL, NULL, NULL, 13, NULL, '2025-05-12 16:26:59', '2025-05-12 16:26:59');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO campaigns (id, name, objective, beneficiary_type, estimated_beneficiaries, start_date, end_date, document_path, status, description, user_id, created_at, updated_at) VALUES
        (1, 'Strong Mothers, Resilient Communities', 'Promote the socioeconomic empowerment of female heads of households in rural areas of Bié province, through the distribution of agricultural kits and training in small business management.', '1', 500, '2025-01-03', '2025-07-05', 'documents/cQd4MUhXXTWfGAhes4iPTpzCScqdey4Q6n8kpAIW.pdf', 'planned', NULL, 1, '2025-05-06 20:25:19', '2025-05-06 20:25:19');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO campaign_products (id, campaign_id, product_id, quantity, unit_id, created_at, updated_at) VALUES
        (1, 1, 1, 1000.00, 1, '2025-05-06 20:25:19', '2025-05-06 20:25:19');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO categories (id, name, description, created_at, updated_at) VALUES
        (1, 'Food', 'Essential food items.', '2025-05-06 20:13:30', '2025-05-06 20:13:30'),
        (2, 'Hygiene', 'Products intended for personal hygiene and cleaning.', '2025-05-06 20:14:14', '2025-05-06 20:14:14'),
        (3, 'Health', 'Medicines, equipment, and services aimed at the promotion and maintenance of health.', '2025-05-06 20:14:47', '2025-05-06 20:14:47'),
        (4, 'Electronics', 'Electronic devices such as TVs, radios, and mobile phones.', '2025-05-06 20:15:14', '2025-05-06 20:15:14');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO products (id, name, photo, category_id, unit_id, state_id, description, min_stock, is_active, barcode, created_at, updated_at) VALUES
        (1, 'Rice', NULL, 1, 1, 1, 'Uncle sam', 10000, 1, 'CB-01-02', '2025-05-06 20:16:22', '2025-06-08 10:45:53'),
        (2, 'Bean', NULL, 1, 1, 1, 'Manioca', 125, 1, 'CB-01-03', '2025-05-06 20:17:07', '2025-06-08 10:46:03'),
        (3, 'Vegetable oil', NULL, 1, 3, 1, 'Fula', 1345, 1, 'CB-01-04', '2025-05-06 20:17:47', '2025-06-08 10:46:10'),
        (4, 'Blue soap', NULL, 2, 2, 1, 'Ype', 1000, 1, 'CB-01-05', '2025-05-06 20:18:36', '2025-06-08 10:46:16'),
        (5, 'Soap', NULL, 2, 2, 1, 'Germon', 500, 1, 'CB-01-06', '2025-05-06 20:19:16', '2025-06-08 10:46:23');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO product_states (id, name, description, created_at, updated_at) VALUES
        (1, 'new', 'Brand new product, in perfect condition', '2025-04-17 15:53:27', '2025-04-17 15:53:27'),
        (2, 'used', 'Used product, but still usable', '2025-04-17 15:53:27', '2025-04-17 15:53:27'),
        (3, 'damaged', 'Damaged or defective product', '2025-04-17 15:53:27', '2025-04-17 15:53:27');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO provinces (id, name, created_at, updated_at) VALUES
        (1, 'Bengo', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (2, 'Benguela', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (3, 'Bié', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (4, 'Cabinda', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (5, 'Cuando', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (6, 'Cuanza Norte', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (7, 'Cuanza Sul', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (8, 'Cubango', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (9, 'Cunene', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (10, 'Huambo', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (11, 'Huíla', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (12, 'Icolo e Bengo', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (13, 'Luanda', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (14, 'Lunda Norte', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (15, 'Lunda Sul', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (16, 'Malanje', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (17, 'Moxico', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (18, 'Moxico Leste', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (19, 'Namibe', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (20, 'Uíge', '2025-04-16 17:12:22', '2025-04-16 17:12:22'),
        (21, 'Zaire', '2025-04-16 17:12:22', '2025-04-16 17:12:22');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stage_histories (id, user_id, reference, type, action, notes, path, created_at, updated_at) VALUES
        (1, 7, 8, 'stock_entry', 'create', NULL, NULL, '2025-06-17 08:40:34', '2025-06-17 09:29:59'),
        (2, 6, 8, 'stock_entry', 'validate_arrival', NULL, 'documents/8fBKpjrWKzwFkfvUHwObEFcnDRcFgGij1FVRNup2.pdf', '2025-06-17 09:21:05', '2025-06-17 09:21:05'),
        (3, 8, 8, 'stock_entry', 'reject_validation', 'Os documentos não estão em ordem..', NULL, '2025-06-17 09:23:40', '2025-06-17 09:23:40'),
        (4, 6, 8, 'stock_entry', 'validate_arrival', NULL, 'documents/KOXSeoOy0xxyX9uX93VfXkvJ3CWJIURWKHOJkVJk.pdf', '2025-06-17 09:26:14', '2025-06-17 09:26:14'),
        (5, 8, 8, 'stock_entry', 'approve_validation', 'Agora sim os documentos estão em ordem..', NULL, '2025-06-17 09:29:02', '2025-06-17 09:29:02'),
        (6, 9, 8, 'stock_entry', 'complete', 'Tudo bem elaborado, estão de parabéns.', NULL, '2025-06-17 09:32:00', '2025-06-17 09:32:00'),
        (10, 1, 10, 'stock_entry', 'create', NULL, NULL, '2025-06-17 18:37:29', '2025-06-17 18:37:29'),
        (11, 8, 5, 'stock_inventory', 'create', 'Primeiro do ano', NULL, '2025-06-18 15:37:22', '2025-06-18 18:17:45'),
        (12, 6, 5, 'stock_inventory', 'review', NULL, NULL, '2025-06-18 16:21:46', '2025-06-18 18:18:21'),
        (13, 9, 5, 'stock_inventory', 'reject', NULL, NULL, '2025-06-18 16:27:04', '2025-06-18 18:18:27'),
        (14, 6, 5, 'stock_inventory', 'review', NULL, NULL, '2025-06-18 16:30:21', '2025-06-18 18:18:37'),
        (15, 9, 5, 'stock_inventory', 'complete', NULL, NULL, '2025-06-18 16:30:45', '2025-06-18 18:18:44'),
        (16, 8, 6, 'stock_inventory', 'create', 'Auditoria', NULL, '2025-06-18 17:16:00', '2025-06-18 18:17:54'),
        (17, 6, 6, 'stock_inventory', 'review', NULL, NULL, '2025-06-18 18:27:08', '2025-06-18 18:27:08'),
        (18, 1, 7, 'stock_inventory', 'create', 'Análise do fluxo', NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (19, 6, 10, 'stock_entry', 'validate_arrival', NULL, 'documents/frcKdngzeJfJRXMlkjgDgb8sty4kaVpQg8l2hgvb.pdf', '2025-06-18 19:07:38', '2025-06-18 19:07:38'),
        (20, 8, 10, 'stock_entry', 'approve_validation', 'Tudo ok', NULL, '2025-06-18 19:09:56', '2025-06-18 19:09:56'),
        (21, 7, 11, 'stock_entry', 'create', NULL, NULL, '2025-06-18 19:12:47', '2025-06-18 19:12:47'),
        (22, 7, 12, 'stock_entry', 'create', NULL, NULL, '2025-06-18 19:13:56', '2025-06-18 19:13:56'),
        (23, 7, 13, 'stock_entry', 'create', NULL, NULL, '2025-06-18 19:15:44', '2025-06-18 19:15:44'),
        (24, 7, 14, 'stock_entry', 'create', NULL, NULL, '2025-06-18 19:17:56', '2025-06-18 19:17:56'),
        (25, 6, 11, 'stock_entry', 'validate_arrival', NULL, 'documents/KoR8BbvlcAxHWAuyxpYsGAAoXqWXa3T8DVMH8cGQ.pdf', '2025-06-18 19:20:23', '2025-06-18 19:20:23'),
        (26, 6, 12, 'stock_entry', 'validate_arrival', NULL, 'documents/L4It2e3skyk48MCgiPVXUvTtCcbuZFVNI9XOWlrT.pdf', '2025-06-18 19:21:31', '2025-06-18 19:21:31'),
        (27, 1, 11, 'stock_output', 'validate_draft', 'Gostei', NULL, '2025-06-20 03:57:55', '2025-06-20 03:57:55'),
        (28, 1, 11, 'stock_output', 'approve_validation', 'Muito bem validado', NULL, '2025-06-20 04:15:05', '2025-06-20 04:17:22'),
        (29, 1, 11, 'stock_output', 'execute', NULL, 'documents/ppqilWFFCOlfLekSvfHZno2TtPy7xoEJ4HHmqqWI.pdf', '2025-06-20 04:31:50', '2025-06-20 04:31:50'),
        (30, 1, 11, 'stock_output', 'reject_execution', 'Não está bom', NULL, '2025-06-20 05:16:24', '2025-06-20 05:16:24'),
        (31, 1, 11, 'stock_output', 'reject_execution', 'péssimo', NULL, '2025-06-20 05:19:50', '2025-06-20 05:19:50'),
        (32, 1, 11, 'stock_output', 'execute', NULL, 'documents/gjvO5MuT95tZbQkvUeCu2nHsxh0gtNZcUXhFvaFW.pdf', '2025-06-20 05:22:06', '2025-06-20 05:22:06'),
        (33, 1, 11, 'stock_output', 'approve_execution', 'Agora ok', NULL, '2025-06-20 05:26:10', '2025-06-20 05:26:10'),
        (34, 1, 12, 'stock_output', 'create', NULL, 'documents/ECB5PGeFCvPbxL8QXapD35dp3inBfi7HiZPtIIXG.pdf', '2025-06-20 06:01:40', '2025-06-20 06:01:40'),
        (35, 8, 12, 'stock_output', 'validate_draft', 'Tudo Ok', NULL, '2025-06-20 06:08:22', '2025-06-20 06:08:22'),
        (36, 9, 12, 'stock_output', 'approve_validation', 'Saída aceita', NULL, '2025-06-20 06:09:43', '2025-06-20 06:09:43'),
        (37, 6, 12, 'stock_output', 'execute', NULL, 'documents/pRHvPJluYdLNnyCqI9HIDgBgWdO2XdH0PrSGOoIS.pdf', '2025-06-20 06:10:45', '2025-06-20 06:10:45'),
        (38, 9, 12, 'stock_output', 'approve_execution', 'Tudo ok', NULL, '2025-06-20 06:11:56', '2025-06-20 06:11:56'),
        (39, 7, 13, 'stock_output', 'create', NULL, 'documents/No54VlE5jNaB9dS1s39LY62w1Pl3rqyAmUkG14lJ.pdf', '2025-06-20 06:14:03', '2025-06-20 06:14:03'),
        (40, 7, 14, 'stock_output', 'create', NULL, 'documents/scebtcfDZhRSmuPi9oaeqqrunOgKxl9o0u4jaiS1.pdf', '2025-06-20 06:14:40', '2025-06-20 06:14:40'),
        (41, 7, 15, 'stock_output', 'create', NULL, 'documents/dxVm71e1UV6ogZMdc568iy1K8PzjTg3DGIfWInGZ.pdf', '2025-06-20 06:15:26', '2025-06-20 06:15:26'),
        (42, 8, 13, 'stock_output', 'validate_draft', 'Processo validado', NULL, '2025-06-20 06:21:20', '2025-06-20 06:21:20'),
        (43, 8, 14, 'stock_output', 'validate_draft', 'Está tudo nos conformes', NULL, '2025-06-20 06:21:54', '2025-06-20 06:21:54'),
        (44, 9, 13, 'stock_output', 'approve_validation', 'Ok', NULL, '2025-06-20 06:23:46', '2025-06-20 06:23:46'),
        (45, 6, 13, 'stock_output', 'execute', NULL, 'documents/cG5qcZAM30MKGMke8S7iiCYQcMZwIFfiwrs0uIVu.pdf', '2025-06-20 06:25:23', '2025-06-20 06:25:23'),
        (46, 7, 16, 'stock_output', 'create', NULL, 'documents/lnGq9sXYFVtJ7iyJT0qdvlY0fb9oChyemoRlMsVr.pdf', '2025-06-20 06:26:23', '2025-06-20 06:26:23'),
        (47, 7, 17, 'stock_output', 'create', NULL, 'documents/VG5wsqc5gQZV1id1gBbd0EcQRR0kHONQ56n2I61L.pdf', '2025-06-20 06:27:14', '2025-06-20 06:27:14'),
        (48, 8, 15, 'stock_output', 'validate_draft', NULL, NULL, '2025-06-20 06:28:23', '2025-06-20 06:28:23'),
        (49, 9, 14, 'stock_output', 'approve_validation', 'ok', NULL, '2025-06-20 06:29:38', '2025-06-20 06:29:38'),
        (50, 1, 15, 'stock_entry', 'create', NULL, NULL, '2025-06-25 10:28:12', '2025-06-25 10:28:12'),
        (51, 1, 16, 'stock_entry', 'create', NULL, NULL, '2025-06-25 10:32:53', '2025-06-25 10:32:53'),
        (52, 1, 17, 'stock_entry', 'create', NULL, NULL, '2025-06-25 10:38:45', '2025-06-25 10:38:45'),
        (54, 1, 17, 'stock_entry', 'validate_arrival', NULL, 'documents/3TXyaUm9VdgI4hWuSHIKAHV0o6WSZtaobzYfzcC6.pdf', '2025-06-25 11:31:53', '2025-06-25 11:31:53'),
        (55, 1, 17, 'stock_entry', 'approve_validation', NULL, NULL, '2025-06-25 12:02:20', '2025-06-25 12:02:20'),
        (56, 1, 16, 'stock_entry', 'validate_arrival', NULL, 'documents/EhpHAIkX9wtJgPMKxeMrkr44yGtvN96sXEJKa8HJ.pdf', '2025-06-25 12:12:01', '2025-06-25 12:12:01'),
        (57, 1, 16, 'stock_entry', 'approve_validation', NULL, NULL, '2025-06-25 12:13:59', '2025-06-25 12:13:59'),
        (58, 1, 15, 'stock_entry', 'validate_arrival', NULL, 'documents/rJdQjqId8rHCM599y6OXNy8GqHZtLOWd92fWyaNW.pdf', '2025-06-25 12:18:21', '2025-06-25 12:18:21'),
        (59, 1, 15, 'stock_entry', 'reject_validation', NULL, NULL, '2025-06-25 12:19:32', '2025-06-25 12:19:32'),
        (60, 1, 12, 'stock_entry', 'approve_validation', NULL, NULL, '2025-06-25 12:25:31', '2025-06-25 12:25:31'),
        (61, 1, 17, 'stock_entry', 'reject_approve', NULL, NULL, '2025-06-25 12:43:40', '2025-06-25 12:43:40'),
        (62, 1, 16, 'stock_entry', 'complete', NULL, NULL, '2025-06-25 12:45:16', '2025-06-25 12:45:16');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_entries (id, warehouse_id, supplier_id, entry_type, document_path, notes, entry_date, user_id, status, validation_document, approve_notes, complete_notes, created_at, updated_at) VALUES
        (7, 2, 2, 'donation', 'documents/8rP5Puvpm6xSjF1VoEcRaQIYGE4RlwasETx9eXA1.xlsx', 'Teste 2', '2025-06-16', 7, 'completed', 'documents/mZnc3j6tOBBUMMVj9Wsoms6splBLOJZ1XoXiuGab.pdf', 'Aprovado a validação', NULL, '2025-06-16 15:47:10', '2025-06-16 16:02:07'),
        (8, 1, 1, 'donation', 'documents/6KnUGac2XvIhzbJXUBJbzd9jEW2zjIkUfuM12G9n.pdf', 'Ajuda', '2025-06-17', 1, 'completed', 'documents/KOXSeoOy0xxyX9uX93VfXkvJ3CWJIURWKHOJkVJk.pdf', 'Agora sim os documentos estão em ordem..', 'Tudo bem elaborado, estão de parabéns.', '2025-06-17 08:40:33', '2025-06-17 09:32:00'),
        (10, 2, 2, 'transfer', 'documents/QM8RQs22nEQ3aq6NxNqXOJjqdCZjtnBjkY8Y2iPX.pdf', NULL, '2025-06-17', 1, 'in_approval', 'documents/frcKdngzeJfJRXMlkjgDgb8sty4kaVpQg8l2hgvb.pdf', 'Tudo ok', NULL, '2025-06-17 18:37:29', '2025-06-18 19:09:56'),
        (11, 2, 1, 'buy', 'documents/ZIg6zWZHAUaVnXTIepnt4l1cO05siSin3fC8lZXR.pdf', NULL, '2025-06-18', 7, 'in_validation', 'documents/KoR8BbvlcAxHWAuyxpYsGAAoXqWXa3T8DVMH8cGQ.pdf', NULL, NULL, '2025-06-18 19:12:46', '2025-06-18 19:20:22'),
        (12, 1, 2, 'transfer', 'documents/lDIfZnfy0y5PbD4oV9wpoH296IbT1TJ5oLsRGb0q.pdf', NULL, '2025-06-18', 7, 'in_approval', 'documents/L4It2e3skyk48MCgiPVXUvTtCcbuZFVNI9XOWlrT.pdf', NULL, NULL, '2025-06-18 19:13:55', '2025-06-25 12:25:31'),
        (13, 2, 2, 'buy', 'documents/YgzWS6WLYCqTzNA5k9p7N1JYWJq04GvFM61jCJwP.pdf', NULL, '2025-06-18', 7, 'draft', NULL, NULL, NULL, '2025-06-18 19:15:44', '2025-06-18 19:15:44'),
        (14, 1, 2, 'transfer', 'documents/7DSGovOmroBLqNGwvQt9VyZK3aqMAXCe5sKFNg6q.pdf', NULL, '2025-06-18', 7, 'draft', NULL, NULL, NULL, '2025-06-18 19:17:56', '2025-06-18 19:17:56'),
        (15, 2, 2, 'donation', 'documents/L2jE0Ee4Xyb0vRITSAtYvzOuqZWI4ZiiDUReGAx6.pdf', 'Compra do Ministério', '2025-06-25', 1, 'draft', 'documents/rJdQjqId8rHCM599y6OXNy8GqHZtLOWd92fWyaNW.pdf', NULL, NULL, '2025-06-25 10:28:11', '2025-06-25 12:19:32'),
        (16, 2, 2, 'donation', 'documents/J7F7mEruLsuHLhof6DFbfVrgBUQlvjhe3ecuPYDu.xlsx', 'Pedido da instituição Asmovila', '2025-06-25', 1, 'completed', 'documents/EhpHAIkX9wtJgPMKxeMrkr44yGtvN96sXEJKa8HJ.pdf', NULL, NULL, '2025-06-25 10:32:53', '2025-06-25 12:45:08'),
        (17, 2, 2, 'donation', 'documents/NtnVO5GtB7BpJfwDD7WF5ifG5ykz5cHXZwe9diNO.pdf', 'Compra do Ministério', '2025-06-25', 1, 'in_validation', 'documents/3TXyaUm9VdgI4hWuSHIKAHV0o6WSZtaobzYfzcC6.pdf', NULL, NULL, '2025-06-25 10:38:44', '2025-06-25 12:43:33');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_entry_items (id, stock_entry_id, product_id, quantity, unit_id, batch_number, state_id, expiration_date, created_at, updated_at) VALUES
        (13, 7, 5, 100.00, 2, 'LT008', 1, '2050-01-01', '2025-06-16 15:47:10', '2025-06-16 15:47:10'),
        (14, 8, 3, 500.00, 3, 'LT002', 1, '2050-01-01', '2025-06-17 08:40:33', '2025-06-17 08:40:33'),
        (17, 10, 4, 500.00, 2, 'LT005', 1, '2050-01-01', '2025-06-17 18:37:29', '2025-06-17 18:37:29'),
        (18, 11, 2, 200.00, 1, 'LT009', 1, '2050-01-01', '2025-06-18 19:12:46', '2025-06-18 19:12:46'),
        (19, 11, 4, 300.00, 2, 'LT010', 1, '2050-01-01', '2025-06-18 19:12:46', '2025-06-18 19:12:46'),
        (20, 12, 1, 298.00, 1, 'LT011', 1, '2050-01-01', '2025-06-18 19:13:55', '2025-06-18 19:13:55'),
        (21, 13, 3, 45.00, 3, 'LT012', 1, '2050-01-01', '2025-06-18 19:15:44', '2025-06-18 19:15:44'),
        (22, 13, 4, 149.00, 2, 'LT012', 1, '2050-01-01', '2025-06-18 19:15:44', '2025-06-18 19:15:44'),
        (23, 13, 5, 100.00, 2, 'LT012', 1, '2050-01-01', '2025-06-18 19:15:44', '2025-06-18 19:15:44'),
        (24, 14, 4, 34.00, 2, 'LT013', 1, '2050-01-01', '2025-06-18 19:17:56', '2025-06-18 19:17:56'),
        (25, 14, 2, 200.00, 1, 'LT014', 1, '2050-01-01', '2025-06-18 19:17:56', '2025-06-18 19:17:56'),
        (26, 15, 3, 12.00, 3, 'LT002', 1, '2050-01-01', '2025-06-25 10:28:11', '2025-06-25 10:28:11'),
        (27, 16, 3, 12.00, 3, 'LT002', 2, '2050-01-01', '2025-06-25 10:32:53', '2025-06-25 10:32:53'),
        (28, 17, 3, 12.00, 3, 'LT003', 2, '2050-01-01', '2025-06-25 10:38:44', '2025-06-25 10:38:44');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_inventories (id, warehouse_id, inventory_date, notes, status, created_by, reviewed_by, reviewed_at, created_at, updated_at) VALUES
        (5, 1, '2025-01-10', 'Primeiro do ano', 'completed', 8, 9, '2025-06-18 17:30:45', '2025-06-18 15:37:22', '2025-06-18 18:16:58'),
        (6, 2, '2020-10-05', 'Auditoria', 'in_review', 8, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (7, 1, '2025-06-10', 'Análise do fluxo', 'draft', 8, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:52');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_inventory_items (id, stock_inventory_id, product_id, batch_id, expected_quantity, counted_quantity, notes, counted_by, created_at, updated_at) VALUES
        (15, 5, 1, 1, 300.00, 100.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (16, 5, 3, 2, 710.00, 200.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (17, 5, 4, 3, 740.00, 789.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (18, 5, 5, 4, 480.00, 765.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (19, 5, 2, 5, 15090.00, 567.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (20, 5, 1, 6, 1000.00, 1000.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (21, 5, 3, 14, 500.00, 800.00, NULL, NULL, '2025-06-18 15:37:22', '2025-06-18 16:21:46'),
        (22, 6, 1, 7, 19800.00, 19800.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (23, 6, 2, 8, 4394.00, 4394.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (24, 6, 3, 9, 3789.00, 3789.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (25, 6, 4, 10, 767.00, 767.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (26, 6, 2, 11, 30.00, 30.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (27, 6, 3, 12, 100.00, 100.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (28, 6, 5, 13, 100.00, 99.00, NULL, NULL, '2025-06-18 17:16:00', '2025-06-18 18:27:08'),
        (29, 7, 1, 1, 300.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (30, 7, 3, 2, 710.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (31, 7, 4, 3, 740.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (32, 7, 5, 4, 480.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (33, 7, 2, 5, 15090.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (34, 7, 1, 6, 1000.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17'),
        (35, 7, 3, 14, 500.00, NULL, NULL, NULL, '2025-06-18 18:31:17', '2025-06-18 18:31:17');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_movements (id, product_id, batch_id, warehouse_id, state_id, quantity, unit_id, type, reason, moved_at, user_id, stock_output_item_id, created_at, updated_at) VALUES
        (1, 1, 1, 1, 1, 500.00, 1, 'in', NULL, '2025-05-06 20:34:48', 1, NULL, '2025-05-06 20:34:48', '2025-05-06 20:34:48'),
        (2, 3, 2, 1, 1, 780.00, 3, 'in', NULL, '2025-05-06 20:38:21', 1, NULL, '2025-05-06 20:38:21', '2025-05-19 05:49:26'),
        (3, 4, 3, 1, 1, 780.00, 2, 'in', NULL, '2025-05-06 20:40:23', 1, NULL, '2025-05-06 20:40:23', '2025-05-06 20:40:23'),
        (4, 5, 4, 1, 1, 500.00, 2, 'in', NULL, '2025-05-06 20:40:23', 1, NULL, '2025-05-06 20:40:23', '2025-05-06 20:40:23'),
        (16, 2, 5, 1, 1, 15090.00, 1, 'in', NULL, '2025-05-12 16:13:51', 2, NULL, '2025-05-12 16:13:51', '2025-05-12 16:13:51'),
        (17, 1, 6, 1, 1, 1000.00, 1, 'in', NULL, '2025-05-12 16:13:51', 2, NULL, '2025-05-12 16:13:51', '2025-05-12 16:13:51'),
        (18, 1, 7, 2, 1, 20000.00, 1, 'in', NULL, '2025-05-25 18:57:33', 2, NULL, '2025-05-25 18:57:33', '2025-05-25 18:57:33'),
        (19, 2, 8, 2, 1, 5000.00, 1, 'in', NULL, '2025-05-25 18:57:33', 2, NULL, '2025-05-25 18:57:33', '2025-05-25 18:57:33'),
        (20, 3, 9, 2, 1, 3789.00, 3, 'in', NULL, '2025-05-25 18:57:33', 2, NULL, '2025-05-25 18:57:33', '2025-05-25 18:57:33'),
        (21, 4, 10, 2, 1, 890.00, 2, 'in', NULL, '2025-05-25 18:57:33', 2, NULL, '2025-05-25 18:57:33', '2025-05-25 18:57:33'),
        (24, 2, 8, 2, 1, -456.00, 1, 'out', NULL, '2025-05-25 19:18:58', 2, 14, '2025-05-25 19:18:58', '2025-05-25 19:18:58'),
        (25, 4, 10, 2, 1, -123.00, 2, 'out', NULL, '2025-05-25 19:21:17', 2, 15, '2025-05-25 19:21:17', '2025-05-25 19:21:17'),
        (26, 2, 11, 2, 1, 30.00, 1, 'in', NULL, '2025-06-16 14:52:08', 1, NULL, '2025-06-16 14:52:08', '2025-06-16 14:52:08'),
        (27, 3, 12, 2, 1, 100.00, 3, 'in', NULL, '2025-06-16 14:52:08', 1, NULL, '2025-06-16 14:52:08', '2025-06-16 14:52:08'),
        (28, 5, 13, 2, 1, 100.00, 2, 'in', NULL, '2025-06-16 16:02:07', 9, NULL, '2025-06-16 16:02:07', '2025-06-16 16:02:07'),
        (29, 3, 14, 1, 1, 500.00, 3, 'in', NULL, '2025-06-17 09:32:00', 9, NULL, '2025-06-17 09:32:00', '2025-06-17 09:32:00'),
        (30, 4, 10, 2, 1, -123.00, 2, 'out', NULL, '2025-06-20 05:26:10', 1, 15, '2025-06-20 05:26:10', '2025-06-20 05:26:10'),
        (31, 1, 7, 2, 1, -500.00, 1, 'out', NULL, '2025-06-20 06:11:56', 9, 16, '2025-06-20 06:11:56', '2025-06-20 06:11:56'),
        (32, 3, 15, 2, 1, 12.00, 3, 'in', NULL, '2025-06-25 12:45:08', 1, NULL, '2025-06-25 12:45:08', '2025-06-25 12:45:08');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_outputs (id, warehouse_id, campaign_id, beneficiary_id, output_type, output_date, document_path, notes, user_id, status, validated_notes, approved_notes, completed_notes, execution_document, created_at, updated_at) VALUES
        (10, 2, 1, 9, 'distribution', '2025-05-19', 'documents/E0zubijqJadFUdhoTmRzU6IzpoVNgSY1hLItVyf2.pdf', 'Beneficiária Urgente', 2, 'completed', NULL, NULL, NULL, NULL, '2025-05-25 19:18:58', '2025-06-20 05:27:37'),
        (11, 2, NULL, 5, 'internal_transfer', '2025-05-22', 'documents/goE6TxU8j7yQ2tgdeak8BgsYaTiqeScqYRw1u1RU.pdf', 'Funcionário MASFAMU', 2, 'completed', 'Gostei', 'Muito bem validado', NULL, 'documents/gjvO5MuT95tZbQkvUeCu2nHsxh0gtNZcUXhFvaFW.pdf', '2025-05-25 19:21:17', '2025-06-20 05:26:10'),
        (12, 2, NULL, 2, 'distribution', '2025-06-20', 'documents/ECB5PGeFCvPbxL8QXapD35dp3inBfi7HiZPtIIXG.pdf', 'BBT VIla nova', 1, 'completed', 'Tudo Ok', 'Saída aceita', NULL, 'documents/pRHvPJluYdLNnyCqI9HIDgBgWdO2XdH0PrSGOoIS.pdf', '2025-06-20 06:01:40', '2025-06-20 06:11:56'),
        (13, 1, NULL, 3, 'institution_donation', '2025-06-20', 'documents/No54VlE5jNaB9dS1s39LY62w1Pl3rqyAmUkG14lJ.pdf', NULL, 7, 'executed', 'Processo validado', 'Ok', NULL, 'documents/cG5qcZAM30MKGMke8S7iiCYQcMZwIFfiwrs0uIVu.pdf', '2025-06-20 06:14:03', '2025-06-20 06:25:22'),
        (14, 1, NULL, 2, 'distribution', '2025-06-20', 'documents/scebtcfDZhRSmuPi9oaeqqrunOgKxl9o0u4jaiS1.pdf', NULL, 7, 'approved', 'Está tudo nos conformes', 'ok', NULL, NULL, '2025-06-20 06:14:40', '2025-06-20 06:29:38'),
        (15, 2, NULL, 5, 'internal_transfer', '2025-06-20', 'documents/dxVm71e1UV6ogZMdc568iy1K8PzjTg3DGIfWInGZ.pdf', NULL, 7, 'validated', NULL, NULL, NULL, NULL, '2025-06-20 06:15:26', '2025-06-20 06:28:23'),
        (16, 2, NULL, 3, 'distribution', '2025-06-20', 'documents/lnGq9sXYFVtJ7iyJT0qdvlY0fb9oChyemoRlMsVr.pdf', NULL, 7, 'draft', NULL, NULL, NULL, NULL, '2025-06-20 06:26:23', '2025-06-20 06:26:23'),
        (17, 1, NULL, 3, 'distribution', '2025-06-20', 'documents/VG5wsqc5gQZV1id1gBbd0EcQRR0kHONQ56n2I61L.pdf', NULL, 7, 'draft', NULL, NULL, NULL, NULL, '2025-06-20 06:27:14', '2025-06-20 06:27:14');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO stock_output_items (id, stock_output_id, product_id, quantity, unit_id, batch_id, created_at, updated_at) VALUES
        (14, 10, 2, 456.00, 1, 8, '2025-05-25 19:18:58', '2025-05-25 19:18:58'),
        (15, 11, 4, 123.00, 2, 10, '2025-05-25 19:21:17', '2025-05-25 19:21:17'),
        (16, 12, 1, 500.00, 1, 7, '2025-06-20 06:01:40', '2025-06-20 06:11:56'),
        (17, 13, 3, 50.00, 3, NULL, '2025-06-20 06:14:03', '2025-06-20 06:14:03'),
        (18, 13, 1, 20.00, 1, NULL, '2025-06-20 06:14:03', '2025-06-20 06:14:03'),
        (19, 14, 5, 35.00, 2, NULL, '2025-06-20 06:14:40', '2025-06-20 06:14:40'),
        (20, 15, 2, 40.00, 1, NULL, '2025-06-20 06:15:26', '2025-06-20 06:15:26'),
        (21, 16, 2, 9.00, 1, NULL, '2025-06-20 06:26:23', '2025-06-20 06:26:23'),
        (22, 17, 1, 99.00, 1, NULL, '2025-06-20 06:27:14', '2025-06-20 06:27:14');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO suppliers (id, name, photo, contact_name, phone, email, address, bi, nif, type, notes, created_at, updated_at) VALUES
        (1, 'Hope Logistics, Lda', NULL, 'António Cambuta', '923456789', 'cambuta@logesperanca.ao', 'Rua da Paz nº 45, Bairro São José, Lubango, Huíla', '002345678LA045', NULL, '1', 'Fornecedor especializado em transporte e fornecimento de cestas básicas para programas sociais nas províncias do sul de Angola.', '2025-05-06 20:32:09', '2025-05-06 20:32:09'),
        (2, 'Trade and Services, Lda', NULL, 'Fernando Manuel dos Santos', '923456789', 'fernando.servicos@gmail.com', 'Rua do Comércio nº 45, Bairro Azul, Luanda', '002345678LA045', NULL, '1', 'Fornecedor de materiais de construção e consumíveis diversos. Atendimento preferencial durante a manhã.', '2025-05-25 11:17:39', '2025-05-25 11:17:39');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO units (id, name, conversion_to_base, base_unit, created_at, updated_at) VALUES
        (1, 'Kilogram', 25.00, 'kg', '2025-05-06 20:10:36', '2025-05-06 20:10:36'),
        (2, 'Unit', 1.00, 'unit', '2025-05-06 20:11:24', '2025-05-06 20:11:24'),
        (3, 'Liter', 1.00, 'L', '2025-05-06 20:11:54', '2025-05-06 20:11:54');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO users (id, name, photo, email, phone, password, access_profile_id, role, permissions, status, email_verified_at, remember_token, two_factor_code, two_factor_expires_at, created_at, updated_at) VALUES
        (1, 'Constantino Fiança', NULL, 'contact@cfianca.com', '951371068', '$2y$10$wgyGy710Ek4WoIfwrbM0ju/gaQtXSQ54ng7pxxNKCefpKh05cXMG6', 1, 'premium', NULL, 'active', NULL, NULL, NULL, NULL, '2025-05-06 19:51:57', '2025-06-25 11:07:50'),
        (6, 'Warehouse Clerk', NULL, 'warehouseclerk@test.com', '991001004', '$2y$10$ATEbBc3rGJ6Cw/7upcdxk.xLYsc0S50Nl47g/KriRhpbYI.FI6DiK', 5, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2025-06-16 15:02:52', '2025-06-25 12:54:08'),
        (7, 'Secretary', NULL, 'secretary@test.com', '998000998', '$2y$10$zTMQEu0Y1OYmKlMxzDyTBury.BOmRxsTI6e.G/1Y2d3hDserAocMy', 4, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2025-06-16 15:44:54', '2025-06-16 15:44:54'),
        (8, 'Section Head', NULL, 'sectionhead@test.com', '998098123', '$2y$10$NJC4qogaTqhc1NUXiluyWeUQ.KEEwqiir7LeCMoGwZtmIG0L81Ke2', 3, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2025-06-16 15:56:12', '2025-06-16 15:56:12'),
        (9, 'Secretary of State', NULL, 'secretaryofstate@test.com', '921005786', '$2y$10$qpqSlqKf/VfJ1hD0CHElgOpmVw0nLZ1MmHuX6pfo7Jbr4HGN1VRk2', 2, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2025-06-16 16:01:12', '2025-06-16 16:01:12'),
        (10, 'Jane Doe', NULL, 'janedoe@cfianca.com', '991001004', '$2y$10$ATEbBc3rGJ6Cw/7upcdxk.xLYsc0S50Nl47g/KriRhpbYI.FI6DiK', 3, NULL, NULL, 'active', NULL, NULL, NULL, NULL, '2025-06-16 15:02:52', '2025-06-25 12:43:17');
        SQL);

        DB::unprepared(<<<'SQL'
        INSERT INTO warehouses (id, name, province_id, address, description, total_capacity, status, created_at, updated_at) VALUES
        (1, 'Central Warehouse Bay B20', 3, 'National Road No. 250, Camacupa Neighborhood, Kuito Municipality', 'Infrastructure intended for the storage and distribution of food supplies and social support materials in the province rural areas.', 1000000, 'active', '2025-05-06 20:28:41', '2025-06-18 18:30:37'),
        (2, 'Central Warehouse Bay B10', 13, 'Viana Industrial Zone, Rua B, Warehouse No. 12', 'Main warehouse for the receipt and distribution of non-perishable goods.', 25000, 'active', '2025-05-25 11:27:11', '2025-06-18 18:30:14');
        SQL);

        // Ajusta as sequências do PostgreSQL após inserir IDs explícitos.
        DB::statement("SELECT setval(pg_get_serial_sequence('access_logs', 'id'), COALESCE((SELECT MAX(id) FROM access_logs), 1), EXISTS (SELECT 1 FROM access_logs))");
        DB::statement("SELECT setval(pg_get_serial_sequence('access_profiles', 'id'), COALESCE((SELECT MAX(id) FROM access_profiles), 1), EXISTS (SELECT 1 FROM access_profiles))");
        DB::statement("SELECT setval(pg_get_serial_sequence('batches', 'id'), COALESCE((SELECT MAX(id) FROM batches), 1), EXISTS (SELECT 1 FROM batches))");
        DB::statement("SELECT setval(pg_get_serial_sequence('beneficiary', 'id'), COALESCE((SELECT MAX(id) FROM beneficiary), 1), EXISTS (SELECT 1 FROM beneficiary))");
        DB::statement("SELECT setval(pg_get_serial_sequence('campaigns', 'id'), COALESCE((SELECT MAX(id) FROM campaigns), 1), EXISTS (SELECT 1 FROM campaigns))");
        DB::statement("SELECT setval(pg_get_serial_sequence('campaign_products', 'id'), COALESCE((SELECT MAX(id) FROM campaign_products), 1), EXISTS (SELECT 1 FROM campaign_products))");
        DB::statement("SELECT setval(pg_get_serial_sequence('categories', 'id'), COALESCE((SELECT MAX(id) FROM categories), 1), EXISTS (SELECT 1 FROM categories))");
        DB::statement("SELECT setval(pg_get_serial_sequence('conditions', 'id'), COALESCE((SELECT MAX(id) FROM conditions), 1), EXISTS (SELECT 1 FROM conditions))");
        DB::statement("SELECT setval(pg_get_serial_sequence('customers', 'id'), COALESCE((SELECT MAX(id) FROM customers), 1), EXISTS (SELECT 1 FROM customers))");
        DB::statement("SELECT setval(pg_get_serial_sequence('failed_jobs', 'id'), COALESCE((SELECT MAX(id) FROM failed_jobs), 1), EXISTS (SELECT 1 FROM failed_jobs))");
        DB::statement("SELECT setval(pg_get_serial_sequence('personal_access_tokens', 'id'), COALESCE((SELECT MAX(id) FROM personal_access_tokens), 1), EXISTS (SELECT 1 FROM personal_access_tokens))");
        DB::statement("SELECT setval(pg_get_serial_sequence('products', 'id'), COALESCE((SELECT MAX(id) FROM products), 1), EXISTS (SELECT 1 FROM products))");
        DB::statement("SELECT setval(pg_get_serial_sequence('product_states', 'id'), COALESCE((SELECT MAX(id) FROM product_states), 1), EXISTS (SELECT 1 FROM product_states))");
        DB::statement("SELECT setval(pg_get_serial_sequence('provinces', 'id'), COALESCE((SELECT MAX(id) FROM provinces), 1), EXISTS (SELECT 1 FROM provinces))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stage_histories', 'id'), COALESCE((SELECT MAX(id) FROM stage_histories), 1), EXISTS (SELECT 1 FROM stage_histories))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_entries', 'id'), COALESCE((SELECT MAX(id) FROM stock_entries), 1), EXISTS (SELECT 1 FROM stock_entries))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_entry_items', 'id'), COALESCE((SELECT MAX(id) FROM stock_entry_items), 1), EXISTS (SELECT 1 FROM stock_entry_items))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_inventories', 'id'), COALESCE((SELECT MAX(id) FROM stock_inventories), 1), EXISTS (SELECT 1 FROM stock_inventories))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_inventory_items', 'id'), COALESCE((SELECT MAX(id) FROM stock_inventory_items), 1), EXISTS (SELECT 1 FROM stock_inventory_items))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_movements', 'id'), COALESCE((SELECT MAX(id) FROM stock_movements), 1), EXISTS (SELECT 1 FROM stock_movements))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_outputs', 'id'), COALESCE((SELECT MAX(id) FROM stock_outputs), 1), EXISTS (SELECT 1 FROM stock_outputs))");
        DB::statement("SELECT setval(pg_get_serial_sequence('stock_output_items', 'id'), COALESCE((SELECT MAX(id) FROM stock_output_items), 1), EXISTS (SELECT 1 FROM stock_output_items))");
        DB::statement("SELECT setval(pg_get_serial_sequence('suppliers', 'id'), COALESCE((SELECT MAX(id) FROM suppliers), 1), EXISTS (SELECT 1 FROM suppliers))");
        DB::statement("SELECT setval(pg_get_serial_sequence('units', 'id'), COALESCE((SELECT MAX(id) FROM units), 1), EXISTS (SELECT 1 FROM units))");
        DB::statement("SELECT setval(pg_get_serial_sequence('users', 'id'), COALESCE((SELECT MAX(id) FROM users), 1), EXISTS (SELECT 1 FROM users))");
        DB::statement("SELECT setval(pg_get_serial_sequence('warehouses', 'id'), COALESCE((SELECT MAX(id) FROM warehouses), 1), EXISTS (SELECT 1 FROM warehouses))");
    }
}
