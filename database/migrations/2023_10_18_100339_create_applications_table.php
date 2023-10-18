<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             //one
            
             $table->string('object');
             $table->string('directions');
             $table->string('intervention_type');
             $table->string('detailed_justification');
             $table->string('budget_line');
             $table->string('supporting_docs');
             $table->string('applicant_name');
             $table->string('applicant_signature');
             $table->date('applicantion_date');
             //two♥
 
             $table->string('budget_implementation');
             $table->string('amount_allocated');
             $table->string('amount_committed');
             $table->string('remaining_amount');
             $table->string('examiner_name');
             $table->date('date_of_signingb');
             //three 
             $table->string('start_produrement_purchases');
             $table->string('date_of_signingp');
             $table->string('reference');
             $table->string('validation_date');
             //four
             $table->string('procedure_chosen');
             $table->string('procedural_document');
             $table->string('recommandations');
             $table->string('provider_proposed');
             $table->string('total_amount');
             $table->string('purchasing_department');
             $table->date('signing_date');
 
 
             //five 
             $table->string('accounting_officer');
             $table->string('is_recommended');
             $table->string('approbation');
             $table->string('excecution');
             $table->date('execution_date')->nullable();
 
             //six
 
             $table->string('order_reference')->nullable();
             $table->string('date of signature')->nullable();
             //seven
             $table->string('remaining_amount_before')->nullable();
             $table->string('final_acquisition')->nullable();
             $table->string('amount_upon_approval')->nullable();
 
 
             //eight
             $table->string('service_rendered')->nullable();
             $table->string('goods_receipt')->nullable();
             $table->string('department_head')->nullable();
             $table->date('date')->nullable();
             $table->string('signture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
