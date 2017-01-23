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
            $table->integer('merchant_id')->comment('Es el número identificador del comercio en el sistema de PayU');
            $table->string('state_pol',32)->comment('Indica el estado de la transacción en el sistema.');
            $table->string('response_code_pol')->comment('  El código de respuesta de PayU.');
            $table->string('reference_sale')->comment('Es la referencia de la venta o pedido.');
            $table->string('reference_pol')->comment('La referencia o número de la transacción generado en PayU.');
            $table->integer('payment_method_type')->comment('El tipo de medio de pago utilizado para el pago.');
            $table->double('value',14,2)->comment('Es el monto total de la transacción.');
            $table->double('tax',14,2)->comment('Es el valor del IVA de la transacción.');
            $table->dateTime('transaction_date')->comment('La fecha en que se realizó la transacción.');
            $table->string('currency',3)->comment('La moneda respectiva en la que se realiza el pago.');
            $table->string('email_buyer')->comment('Campo que contiene el correo electrónico del comprador para notificarle el resultado de la transacción por correo electrónico.');
            $table->string('cus',64)->comment('código único de seguimiento, es la referencia del pago dentro del Banco, aplica solo para pagos con PSE.');
            $table->string('pse_bank')->comment('El nombre del banco, aplica solo para pagos con PSE.');
            $table->string('description')->comment('Es la descripción de la venta.');
            $table->string('billing_address')->comment('La dirección de facturación.');
            $table->string('shipping_address',50)->comment('La dirección de entrega de la mercancía.');
            $table->string('phone',20)->comment('El teléfono de residencia del comprador.');
            $table->string('office_phone',20)->comment('El teléfono diurno del comprador.');
            $table->string('account_number_ach',36)->comment('Identificador de la transacción.');
            $table->string('account_type_ach',36)->comment('Identificador de la transacción.');
            $table->string('authorization_code',12)->comment('Código de autorización de la venta.');
            $table->string('bank_id')->comment('Identificador del banco.');
            $table->string('billing_city')->comment('La ciudad de facturación.');
            $table->string('billing_country',2)->comment('El código ISO del país asociado a la dirección de facturación.');
            $table->integer('customer_number')->comment('Numero de cliente.');
            $table->dateTime('date')->comment('Fecha de la operación.');
            $table->string('error_code_bank')->comment('Código de error del banco.');
            $table->string('error_message_bank')->comment('Mensaje de error del banco');
            $table->double('exchange_rate')->comment('Valor de la tasa de cambio.');
            $table->string('ip',39)->comment('Dirección ip desde donde se realizó la transacción.');
            $table->integer('payment_method_id')->comment('Identificador del medio de pago.');
            $table->string('payment_request_state')->comment('Estado de la solicitud de pago.');
            $table->string('pseReference1')->comment('Referencia no. 1 para pagos con PSE.');
            $table->string('pseReference2')->comment('Referencia no. 2 para pagos con PSE.');
            $table->string('pseReference3')->comment('Referencia no. 3 para pagos con PSE.');
            $table->string('response_message_pol')->comment('El mensaje de respuesta de PAYU.');
            $table->string('shipping_city',50)->comment('La ciudad de entrega de la mercancía.');
            $table->string('shipping_country',2)->comment('El código ISO asociado al país de entrega de la mercancía.');
            $table->string('transaction_bank_id')->comment('Identificador de la transacción en el sistema del banco.');
            $table->string('transaction_id',36)->comment('Identificador de la transacción.');
            $table->string('payment_method_name')->comment('Medio de pago con el cual se hizo el pago. Por ejemplo VISA.');
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
