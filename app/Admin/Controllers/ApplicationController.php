<?php

namespace App\Admin\Controllers;

use App\models\Application;
use Doctrine\DBAL\Driver\Mysqli\Initializer\Options;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field\Divider;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ApplicationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Application';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Application());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('object', __('Objet'));
        $grid->column('directions', __('Direction'));
        $grid->column('intervention_type', __('Type d’intervention'));
        $grid->column('detailed_justification', __('Justification détaillée'));
        $grid->column('budget_line', __('Ligne Budgétaire'));
        $grid->column('supporting_docs', __('Pièces justificatives'));
        $grid->column('applicant_name', __('Nom et titre du demandeur'));
        $grid->column('applicant_signature', __('Signature du demandeur'));
        $grid->column('applicantion_date', __('Date et Signature du demandeur'))->default(date('Y-m-d'));



        $grid->column('budget_implementation', __('Prévision et exécution budgétaire'));
        $grid->column('amount_allocated', __('Montant alloué'));
        $grid->column('amount_committed', __('Montant engagé au jour de la demande'));
        $grid->column('remaining_amount', __('Montant restant avant l’approbation de la demande:'));
        $grid->column('examiner_name', __('Nom et titre de l’examinateur'));
        $grid->column('date_of_signingb', __('Date of signingb'))->default(date('Y-m-d'));



        $grid->column('start_produrement_purchases', __('Date et Signature de l’examinateur'));
        $grid->column('date_of_signingp', __('Date et signature'));
        $grid->column('reference', __('Référence DG'));
        $grid->column('validation_date', __('Date de la validation initiale'));



        $grid->column('procedure_chosen', __('Lancer la procédure d’achats'));
        $grid->column('procedural_document', __('Documents de la procédure d’achats'));
        $grid->column('recommandations', __('Recommandations'));
        $grid->column('provider_proposed', __('Nom et contact du fournisseur/prestataire proposé'));
        $grid->column('total_amount', __('Cout total'));
        $grid->column('purchasing_department', __('Nom et titre des agents du service achats'));
        $grid->column('signing_date', __('Date et signatures'))->default(date('Y-m-d'));



        $grid->columnt('accounting_officer', __('Accounting officer'));
        $grid->column('is_recommended', __('Recommandé'));
        $grid->column('approbation', __('Approbation du DG /DGA'));
        $grid->column('excecution', __('Exécution immédiate□'));
        $grid->column('execution_date', __('Date et signature :'))->default(date('Y-m-d'));


        $grid->column('order_reference', __('Référence commande'));
        $grid->column('date of signature', __('Date de signature'));



        $grid->column('remaining_amount_before', __('Montant restant avant l’approbation de la demande'));
        $grid->column('final_acquisition', __('Cout final de l’acquisition'));
        $grid->column('amount_upon_approval', __('Montant restant après l’approbation de la demande'));



        $grid->column('service_rendered', __('Matériel reçu / service fait'));
        $grid->column('goods_receipt', __('Référence certificat / Bon de réception:'));
        $grid->column('department_head', __('Nom du chef de service / Directeur'));
        $grid->column('date', __('Date'))->default(date('Y-m-d'));
        $grid->column('signture', __('Signture'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Application::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('object', __('Object'));
        $show->field('directions', __('Directions'));
        $show->field('intervention_type', __('Intervention type'));
        $show->field('detailed_justification', __('Detailed justification'));
        $show->field('budget_line', __('Budget line'));
        $show->field('supporting_docs', __('Supporting docs'));
        $show->field('applicant_name', __('Applicant name'));
        $show->field('applicant_signature', __('Applicant signature'));
        $show->field('applicantion_date', __('Applicantion date'));
        $show->field('budget_implementation', __('Budget implementation'));
        $show->field('amount_allocated', __('Amount allocated'));
        $show->field('amount_committed', __('Amount committed'));
        $show->field('remaining_amount', __('Remaining amount'));
        $show->field('examiner_name', __('Examiner name'));
        $show->field('date_of_signingb', __('Date of signingb'));
        $show->field('start_produrement_purchases', __('Start produrement purchases'));
        $show->field('date_of_signingp', __('Date of signingp'));
        $show->field('reference', __('Reference'));
        $show->field('validation_date', __('Validation date'));
        $show->field('procedure_chosen', __('Procedure chosen'));
        $show->field('procedural_document', __('Procedural document'));
        $show->field('recommandations', __('Recommandations'));
        $show->field('provider_proposed', __('Provider proposed'));
        $show->field('total_amount', __('Total amount'));
        $show->field('purchasing_department', __('Purchasing department'));
        $show->field('signing_date', __('Signing date'));
        $show->field('accounting_officer', __('Accounting officer'));
        $show->field('is_recommended', __('Is recommended'));
        $show->field('approbation', __('Approbation'));
        $show->field('excecution', __('Excecution'));
        $show->field('execution_date', __('Execution date'));
        $show->field('order_reference', __('Order reference'));
        $show->field('date of signature', __('Date of signature'));
        $show->field('remaining_amount_before', __('Remaining amount before'));
        $show->field('final_acquisition', __('Final acquisition'));
        $show->field('amount_upon_approval', __('Amount upon approval'));
        $show->field('service_rendered', __('Service rendered'));
        $show->field('goods_receipt', __('Goods receipt'));
        $show->field('department_head', __('Department head'));
        $show->field('date', __('Date'));
        $show->field('signture', __('Signture'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Application());
        $form->divider('1.DESCRIPTION DE LA DEMANDE');

        $form->text('object', __('Objet'));

        $form->checkbox('directions', __('Direction'))
            ->options([
                'AC' => 'AC',
                'DAF' => 'DAF',
                'DC' => 'DG',
                'DGA' => 'DGA',
                'DRH' => 'DRH',
                'DT' => 'DT',
                'DR Anjouan' => 'DR Anjouan',
                'DR Mohéli' => 'DR Mohéli',
                'DR Ngazidja' => 'DR Ngazidja',
            ]);
        $form->checkbox('intervention_type', __('Type d’intervention'))
            ->options([
                'Nouveau' => 'Nouveau',
                'Réparation' => 'Réparation',
                'Renouvellement' => 'Renouvellement stock',
                'Autre' => 'Autre (préciser)',
            ]);
        $form->text('detailed_justification', __('Justification détaillée'));
        $form->checkbox('budget_line', __('Ligne Budgétaire'))
            ->options([
                'Achats' => 'Achats stockés de matières et fournitures',
                'Autres ' => 'Autres achats',
                'Transport' => 'Transport',
                'Services' => 'Services extérieurs',
                ' extérieurs' => 'Autres services extérieurs',
            ]);
        $form->checkbox('supporting_docs', __('Pièces justificatives'))
            ->options([
                'inspection' => 'Rapport d’inspection interne',
                'Inventaire' => 'Inventaire',
                'Rapport' => 'Rapport d’audit externe',
                'Autre_préciser' => 'Autre (préciser)',
            ]);
        $form->text('applicant_name', __('Nom et titre du demandeur'));
        $form->text('applicant_signature', __('Signature du demandeur'));
        $form->date('applicantion_date', __('Date et Signature du demandeur'))->default(date('Y-m-d'));

        $form->divider('2.Examen de l’agence comptable');

        $form->text('budget_implementation', __('Prévision et exécution budgétaire'));
        $form->text('amount_allocated', __('Montant alloué'));
        $form->text('amount_committed', __('Montant engagé au jour de la demande'));
        $form->text('remaining_amount', __('Montant restant avant l’approbation de la demande:'));
        $form->text('examiner_name', __('Nom et titre de l’examinateur'));
        $form->date('date_of_signingb', __('Date of signingb'))->default(date('Y-m-d'));

        $form->divider('3.Visa initial DG / DGA pour lancement de la procédure d’achats');

        $form->checkbox('start_produrement_purchases', __('Lancer la procédure d’achats'))
            ->options([
                'oui' => 'oui',
                'non' => 'non',
            ]);
        $form->text('date_of_signingp', __('Date et signature'));
        // must add  A COLUMN HERE  FOR EXECUTION
        $form->text('reference', __('Référence DG'));
        $form->text('validation_date', __('Date de la validation initiale'));

        $form->divider('4. Examen du service achats');

        $form->checkbox('procedure_chosen', __('Lancer la procédure d’achats'))
            ->options([
                'direct' => 'achat direct',
                'demande' => 'demande de cotation',
                'appel' => 'appel d’offres',
                'autre(préciser)' => 'autre (préciser)',
            ]);
        $form->text('procedural_document', __('Documents de la procédure d’achats'))
            ->options([
                'Termes' => 'Termes de référence',
                'cotations' => 'cotations reçues',
                'rapport' => 'rapport d’évaluation',
            ]);
        $form->text('recommandations', __('Recommandations'));
        $form->text('provider_proposed', __('Nom et contact du fournisseur/prestataire proposé'));
        $form->currency('total_amount', __('Cout total'));
        $form->text('purchasing_department', __('Nom et titre des agents du service achats'));
        $form->date('signing_date', __('Date et signatures'))->default(date('Y-m-d'));

        $form->divider('5.Recommandation & Approbation pour exécution');

        $form->text('accounting_officer', __('Recommandation de l’Agent Comptable'));
        $form->radio('is_recommended', __('Recommandé'))
            ->options([
                'oui' => 'oui',
                'non' => 'non',
            ]);
        $form->radio('approbation', __('Approuve'))
            ->options([
                'oui' => 'oui',
                'non' => 'non',
            ])->when('oui', function (Form $form) {
                $form->radio('excecution', __('Exécution immédiate'))
                    ->options([
                        'Exécutionimmédiate' => 'Exécution immédiate',
                        'déféréau' => 'déféré au',
                    ]);
            });

        $form->date('execution_date', __('Date et signature :'))->default(date('Y-m-d'));

        $form->divider('6.Suivi de la Direction Administrative et Financière');

        $form->radio('order_reference', __('Référence commande'))
        ->options([
            'Contrat'=>'Contrat',
            'Bondecommande'=>'Bon de commande',
        ]);
        $form->text('date of signature', __('Date de signature'));

        $form->divider('7.Suivi de l’agence comptable');

        $form->text('remaining_amount_before', __('Montant restant avant l’approbation de la demande'));
        $form->text('final_acquisition', __('Cout final de l’acquisition'));
        $form->text('amount_upon_approval', __('Montant restant après l’approbation de la demande'));

        $form->divider('8.Suivi de la mise en oeuvre');

        $form->text('service_rendered', __('Matériel reçu / service fait'));
        $form->text('goods_receipt', __('Référence certificat / Bon de réception:'));
        $form->text('department_head', __('Nom du chef de service / Directeur'));
        $form->date('date', __('Date'))->default(date('Y-m-d'));
        $form->text('signture', __('Signture'));

        return $form;
    }
}
