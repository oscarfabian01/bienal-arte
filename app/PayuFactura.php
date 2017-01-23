<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayuFactura extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payuFactura';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'merchant_id', 'state_pol', 'response_code_pol', 'reference_sale',
    						'reference_pol', 'payment_method_type', 'value', 'tax',
    						'transaction_date', 'currency', 'email_buyer', 'cus',
    						'pse_bank', 'description', 'billing_address', 'shipping_address',
    						'phone', 'office_phone', 'account_number_ach', 'account_type_ach',
    						'authorization_code', 'bank_id', 'billing_city', 'billing_country',
    						'customer_number', 'date', 'error_code_bank', 'error_message_bank',
    						'exchange_rate', 'ip', 'payment_method_id', 'payment_request_state',
    						'pseReference1', 'pseReference2', 'pseReference3', 'response_message_pol',
    						'shipping_city', 'shipping_country', 'transaction_bank_id', 'transaction_id',
    						'payment_method_name' ];
}

