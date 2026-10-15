<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('access_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('action', 255);
            $table->bigInteger('action_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->string('country', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE access_logs ADD CONSTRAINT access_logs_user_id_check CHECK (user_id > 0)");
        DB::statement("ALTER TABLE access_logs ADD CONSTRAINT access_logs_action_id_check CHECK (action_id > 0)");

        Schema::create('access_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });

        Schema::create('batches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('supplier_id')->nullable();
            $table->bigInteger('warehouse_id');
            $table->bigInteger('state_id')->default(1);
            $table->decimal('quantity', 10, 2)->default(0.00);
            $table->string('batch_number', 255)->nullable();
            $table->bigInteger('unit_id');
            $table->string('entry_type', 30);
            $table->date('expiration_date')->nullable();
            $table->date('entry_date')->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_supplier_id_check CHECK (supplier_id > 0)");
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_warehouse_id_check CHECK (warehouse_id > 0)");
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_state_id_check CHECK (state_id > 0)");
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_unit_id_check CHECK (unit_id > 0)");
        DB::statement("ALTER TABLE batches ADD CONSTRAINT batches_entry_type_check CHECK (entry_type in ('buy','donation','transfer','other'))");

        Schema::create('beneficiary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('photo', 255)->nullable();
            $table->string('type', 30)->default('1');
            $table->string('gender', 30)->nullable();
            $table->date('dob')->nullable();
            $table->string('bi', 20)->nullable();
            $table->string('nif', 20)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->integer('id_province')->default(13);
            $table->string('address', 255)->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE beneficiary ADD CONSTRAINT beneficiary_type_check CHECK (type in ('1','2'))");
        DB::statement("ALTER TABLE beneficiary ADD CONSTRAINT beneficiary_gender_check CHECK (gender in ('male','female'))");

        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('objective');
            $table->string('beneficiary_type', 30)->default('1');
            $table->double('estimated_beneficiaries');
            $table->date('start_date')->default('2025-01-01');
            $table->date('end_date')->default('2025-06-01');
            $table->string('document_path', 255);
            $table->string('status', 30)->default('planned');
            $table->text('description')->nullable();
            $table->bigInteger('user_id');
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE campaigns ADD CONSTRAINT campaigns_beneficiary_type_check CHECK (beneficiary_type in ('1','2'))");
        DB::statement("ALTER TABLE campaigns ADD CONSTRAINT campaigns_status_check CHECK (status in ('inprogress','completed','planned','disabled'))");

        Schema::create('campaign_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('campaign_id');
            $table->bigInteger('product_id');
            $table->decimal('quantity', 10, 2);
            $table->bigInteger('unit_id');
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE campaign_products ADD CONSTRAINT campaign_products_campaign_id_check CHECK (campaign_id > 0)");
        DB::statement("ALTER TABLE campaign_products ADD CONSTRAINT campaign_products_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE campaign_products ADD CONSTRAINT campaign_products_unit_id_check CHECK (unit_id > 0)");

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamp('created_at', 0)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
        });

        Schema::create('conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username', 250)->nullable();
            $table->string('email', 250)->nullable();
            $table->string('phone', 250)->nullable();
            $table->string('address', 250)->nullable();
            $table->double('rating')->nullable();
            $table->double('balance')->nullable();
            $table->date('joining_date')->nullable();
            $table->timestamp('created_at', 0)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uuid', 191);
            $table->text('connection');
            $table->text('queue');
            $table->text('payload');
            $table->text('exception');
            $table->timestamp('failed_at', 0)->useCurrent();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email', 191);
            $table->string('token', 191);
            $table->timestamp('created_at', 0)->nullable();
        });

        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tokenable_type', 191);
            $table->bigInteger('tokenable_id');
            $table->string('name', 191);
            $table->string('token', 64);
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at', 0)->nullable();
            $table->timestamp('created_at', 0)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
        });
        DB::statement("ALTER TABLE personal_access_tokens ADD CONSTRAINT personal_access_tokens_tokenable_id_check CHECK (tokenable_id > 0)");

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('photo', 255)->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('state_id')->default(1);
            $table->text('description')->nullable();
            $table->double('min_stock')->default(0);
            $table->smallInteger('is_active')->default(1);
            $table->string('barcode', 255)->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });

        Schema::create('product_states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });

        Schema::create('stage_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->bigInteger('reference');
            $table->string('type', 30);
            $table->string('action', 20);
            $table->string('notes', 255)->nullable();
            $table->string('path', 255)->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE stage_histories ADD CONSTRAINT stage_histories_user_id_check CHECK (user_id > 0)");
        DB::statement("ALTER TABLE stage_histories ADD CONSTRAINT stage_histories_reference_check CHECK (reference > 0)");
        DB::statement("ALTER TABLE stage_histories ADD CONSTRAINT stage_histories_type_check CHECK (type in ('stock_entry','stock_output','stock_inventory'))");

        Schema::create('stock_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('warehouse_id');
            $table->bigInteger('supplier_id')->nullable();
            $table->string('entry_type', 30);
            $table->string('document_path', 255)->nullable();
            $table->text('notes')->nullable();
            $table->date('entry_date');
            $table->bigInteger('user_id');
            $table->string('status', 30)->default('draft');
            $table->string('validation_document', 255)->nullable();
            $table->string('approve_notes', 255)->nullable();
            $table->string('complete_notes', 255)->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE stock_entries ADD CONSTRAINT stock_entries_warehouse_id_check CHECK (warehouse_id > 0)");
        DB::statement("ALTER TABLE stock_entries ADD CONSTRAINT stock_entries_supplier_id_check CHECK (supplier_id > 0)");
        DB::statement("ALTER TABLE stock_entries ADD CONSTRAINT stock_entries_entry_type_check CHECK (entry_type in ('buy','donation','transfer','other'))");
        DB::statement("ALTER TABLE stock_entries ADD CONSTRAINT stock_entries_status_check CHECK (status in ('draft','in_validation','in_approval','completed'))");

        Schema::create('stock_entry_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_entry_id');
            $table->bigInteger('product_id');
            $table->decimal('quantity', 10, 2);
            $table->bigInteger('unit_id');
            $table->string('batch_number', 100)->nullable();
            $table->bigInteger('state_id');
            $table->date('expiration_date')->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE stock_entry_items ADD CONSTRAINT stock_entry_items_stock_entry_id_check CHECK (stock_entry_id > 0)");
        DB::statement("ALTER TABLE stock_entry_items ADD CONSTRAINT stock_entry_items_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE stock_entry_items ADD CONSTRAINT stock_entry_items_unit_id_check CHECK (unit_id > 0)");
        DB::statement("ALTER TABLE stock_entry_items ADD CONSTRAINT stock_entry_items_state_id_check CHECK (state_id > 0)");

        Schema::create('stock_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('warehouse_id');
            $table->date('inventory_date');
            $table->text('notes')->nullable();
            $table->string('status', 30)->default('draft');
            $table->bigInteger('created_by');
            $table->bigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at', 0)->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE stock_inventories ADD CONSTRAINT stock_inventories_warehouse_id_check CHECK (warehouse_id > 0)");
        DB::statement("ALTER TABLE stock_inventories ADD CONSTRAINT stock_inventories_status_check CHECK (status in ('draft','in_review','completed'))");
        DB::statement("ALTER TABLE stock_inventories ADD CONSTRAINT stock_inventories_created_by_check CHECK (created_by > 0)");
        DB::statement("ALTER TABLE stock_inventories ADD CONSTRAINT stock_inventories_reviewed_by_check CHECK (reviewed_by > 0)");

        Schema::create('stock_inventory_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_inventory_id');
            $table->bigInteger('product_id');
            $table->bigInteger('batch_id');
            $table->decimal('expected_quantity', 10, 2);
            $table->decimal('counted_quantity', 10, 2)->nullable();
            $table->text('notes')->nullable();
            $table->bigInteger('counted_by')->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE stock_inventory_items ADD CONSTRAINT stock_inventory_items_stock_inventory_id_check CHECK (stock_inventory_id > 0)");
        DB::statement("ALTER TABLE stock_inventory_items ADD CONSTRAINT stock_inventory_items_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE stock_inventory_items ADD CONSTRAINT stock_inventory_items_batch_id_check CHECK (batch_id > 0)");
        DB::statement("ALTER TABLE stock_inventory_items ADD CONSTRAINT stock_inventory_items_counted_by_check CHECK (counted_by > 0)");

        Schema::create('stock_movements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('batch_id')->nullable();
            $table->bigInteger('warehouse_id');
            $table->bigInteger('state_id')->default(1);
            $table->decimal('quantity', 10, 2);
            $table->bigInteger('unit_id');
            $table->string('type', 30);
            $table->text('reason')->nullable();
            $table->timestamp('moved_at', 0)->useCurrent();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('stock_output_item_id')->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_batch_id_check CHECK (batch_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_warehouse_id_check CHECK (warehouse_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_state_id_check CHECK (state_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_unit_id_check CHECK (unit_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_type_check CHECK (type in ('in','out'))");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_user_id_check CHECK (user_id > 0)");
        DB::statement("ALTER TABLE stock_movements ADD CONSTRAINT stock_movements_stock_output_item_id_check CHECK (stock_output_item_id > 0)");

        Schema::create('stock_outputs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('warehouse_id');
            $table->bigInteger('campaign_id')->nullable();
            $table->bigInteger('beneficiary_id');
            $table->string('output_type', 30);
            $table->date('output_date');
            $table->string('document_path', 255)->nullable();
            $table->text('notes')->nullable();
            $table->bigInteger('user_id');
            $table->string('status', 30)->default('draft');
            $table->string('validated_notes', 255)->nullable();
            $table->string('approved_notes', 255)->nullable();
            $table->string('completed_notes', 255)->nullable();
            $table->string('execution_document', 255)->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_warehouse_id_check CHECK (warehouse_id > 0)");
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_campaign_id_check CHECK (campaign_id > 0)");
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_beneficiary_id_check CHECK (beneficiary_id > 0)");
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_output_type_check CHECK (output_type in ('distribution','institution_donation','internal_transfer','campaign'))");
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_user_id_check CHECK (user_id > 0)");
        DB::statement("ALTER TABLE stock_outputs ADD CONSTRAINT stock_outputs_status_check CHECK (status in ('draft','validated','approved','executed','completed'))");

        Schema::create('stock_output_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_output_id');
            $table->bigInteger('product_id');
            $table->decimal('quantity', 10, 2);
            $table->bigInteger('unit_id');
            $table->bigInteger('batch_id')->nullable();
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE stock_output_items ADD CONSTRAINT stock_output_items_stock_output_id_check CHECK (stock_output_id > 0)");
        DB::statement("ALTER TABLE stock_output_items ADD CONSTRAINT stock_output_items_product_id_check CHECK (product_id > 0)");
        DB::statement("ALTER TABLE stock_output_items ADD CONSTRAINT stock_output_items_unit_id_check CHECK (unit_id > 0)");
        DB::statement("ALTER TABLE stock_output_items ADD CONSTRAINT stock_output_items_batch_id_check CHECK (batch_id > 0)");

        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('photo', 255)->nullable();
            $table->string('contact_name', 255);
            $table->string('phone', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('address')->nullable();
            $table->string('bi', 50)->nullable();
            $table->string('nif', 50)->nullable();
            $table->string('type', 30)->default('1');
            $table->text('notes')->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE suppliers ADD CONSTRAINT suppliers_type_check CHECK (type in ('1','2'))");

        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->decimal('conversion_to_base', 10, 2)->nullable();
            $table->string('base_unit', 50)->nullable();
            $table->timestamp('created_at', 0)->nullable();
            $table->timestamp('updated_at', 0)->nullable();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->string('photo', 255)->nullable();
            $table->string('email', 255);
            $table->string('phone', 50);
            $table->string('password', 255);
            $table->bigInteger('access_profile_id');
            $table->string('role', 30)->nullable();
            $table->string('permissions', 50)->nullable();
            $table->string('status', 30)->default('active');
            $table->timestamp('email_verified_at', 0)->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('two_factor_code', 255)->nullable();
            $table->timestamp('two_factor_expires_at', 0)->nullable();
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_access_profile_id_check CHECK (access_profile_id > 0)");
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_role_check CHECK (role in ('premium','admin','operator','viewer'))");
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_status_check CHECK (status in ('active','inactive','blocked'))");

        Schema::create('warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->bigInteger('province_id');
            $table->string('address', 255)->nullable();
            $table->text('description')->nullable();
            $table->double('total_capacity');
            $table->string('status', 30)->default('active');
            $table->timestamp('created_at', 0)->nullable()->useCurrent();
            $table->timestamp('updated_at', 0)->nullable()->useCurrent();
        });
        DB::statement("ALTER TABLE warehouses ADD CONSTRAINT warehouses_status_check CHECK (status in ('active','disabled'))");

    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('users');
        Schema::dropIfExists('units');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('stock_output_items');
        Schema::dropIfExists('stock_outputs');
        Schema::dropIfExists('stock_movements');
        Schema::dropIfExists('stock_inventory_items');
        Schema::dropIfExists('stock_inventories');
        Schema::dropIfExists('stock_entry_items');
        Schema::dropIfExists('stock_entries');
        Schema::dropIfExists('stage_histories');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('product_states');
        Schema::dropIfExists('products');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('conditions');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('campaign_products');
        Schema::dropIfExists('campaigns');
        Schema::dropIfExists('beneficiary');
        Schema::dropIfExists('batches');
        Schema::dropIfExists('access_profiles');
        Schema::dropIfExists('access_logs');
    }
};
