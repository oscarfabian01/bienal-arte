<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayuFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payu_factura', function(Blueprint $table){
            $table->increments('id')->comment('ID de la tabla');
            $table->integer('merchant_id')->nullable()->comment('Es el número identificador del comercio en el sistema de PayU');
            $table->string('state_pol',32)->nullable()->comment('Indica el estado de la transacción en el sistema.');
            $table->string('response_code_pol')->nullable()->comment('  El código de respuesta de PayU.');
            $table->string('reference_sale')->nullable()->comment('Es la referencia de la venta o pedido.');
            $table->string('reference_pol')->nullable()->comment('La referencia o número de la transacción generado en PayU.');
            $table->integer('payment_method_type')->nullable()->comment('El tipo de medio de pago utilizado para el pago.');
            $table->double('value',14,2)->nullable()->comment('Es el monto total de la transacción.');
            $table->double('tax',14,2)->nullable()->comment('Es el valor del IVA de la transacción.');
            $table->dateTime('transaction_date')->nullable()->comment('La fecha en que se realizó la transacción.');
            $table->string('currency',3)->nullable()->comment('La moneda respectiva en la que se realiza el pago.');
            $table->string('email_buyer')->nullable()->comment('Campo que contiene el correo electrónico del comprador para notificarle el resultado de la transacción por correo electrónico.');
            $table->string('cus',64)->nullable()->comment('código único de seguimiento, es la referencia del pago dentro del Banco, aplica solo para pagos con PSE.');
            $table->string('pse_bank')->nullable()->comment('El nombre del banco, aplica solo para pagos con PSE.');
            $table->string('description')->nullable()->comment('Es la descripción de la venta.');
            $table->string('billing_address')->nullable()->comment('La dirección de facturación.');
            $table->string('shipping_address',50)->nullable()->comment('La dirección de entrega de la mercancía.');
            $table->string('phone',20)->nullable()->comment('El teléfono de residencia del comprador.');
            $table->string('office_phone',20)->nullable()->comment('El teléfono diurno del comprador.');
            $table->string('account_number_ach',36)->nullable()->comment('Identificador de la transacción.');
            $table->string('account_type_ach',36)->nullable()->comment('Identificador de la transacción.');
            $table->string('authorization_code',12)->nullable()->comment('Código de autorización de la venta.');
            $table->string('bank_id')->nullable()->comment('Identificador del banco.');
            $table->string('billing_city')->nullable()->comment('La ciudad de facturación.');
            $table->string('billing_country',2)->nullable()->comment('El código ISO del país asociado a la dirección de facturación.');
            $table->integer('customer_number')->nullable()->comment('Numero de cliente.');
            $table->dateTime('date')->nullable()->comment('Fecha de la operación.');
            $table->string('error_code_bank')->nullable()->comment('Código de error del banco.');
            $table->string('error_message_bank')->nullable()->comment('Mensaje de error del banco');
            $table->double('exchange_rate')->nullable()->comment('Valor de la tasa de cambio.');
            $table->string('ip',39)->nullable()->comment('Dirección ip desde donde se realizó la transacción.');
            $table->integer('payment_method_id')->nullable()->comment('Identificador del medio de pago.');
            $table->string('payment_request_state')->nullable()->comment('Estado de la solicitud de pago.');
            $table->string('pseReference1')->nullable()->comment('Referencia no. 1 para pagos con PSE.');
            $table->string('pseReference2')->nullable()->comment('Referencia no. 2 para pagos con PSE.');
            $table->string('pseReference3')->nullable()->comment('Referencia no. 3 para pagos con PSE.');
            $table->string('response_message_pol')->nullable()->comment('El mensaje de respuesta de PAYU.');
            $table->string('shipping_city',50)->nullable()->comment('La ciudad de entrega de la mercancía.');
            $table->string('shipping_country',2)->nullable()->comment('El código ISO asociado al país de entrega de la mercancía.');
            $table->string('transaction_bank_id')->nullable()->comment('Identificador de la transacción en el sistema del banco.');
            $table->string('transaction_id',36)->nullable()->comment('Identificador de la transacción.');
            $table->string('payment_method_name')->nullable()->comment('Medio de pago con el cual se hizo el pago. Por ejemplo VISA.');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payu_factura');
    }
}
