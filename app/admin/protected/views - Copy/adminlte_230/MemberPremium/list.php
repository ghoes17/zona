<?php
Yii::app()->clientScript->registerScript('search', "
	// $('.search-button').click(function(){
		// $('.search-form').toggle();
		// return false;
	// });
	// $('.search-form form').submit(function(){
		// $('#users-grid').yiiGridView('update', {
			// data: $(this).serialize()
		// });
		// return false;
	// });
	$('.search-select').change(function(){
		val = $('.search-select').val();
		name_input = 'MemberPremium['+val+']';
		$('.search-input').attr('name', name_input);
		
	});
");
?>
<section class="content-header">
	<h1>
	Member Premium
	<small>Semua Member Premium</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="<?php echo Yii::app()->baseUrl.'/dashboard'; ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="active"><i class="fa fa-users"></i> Semua Member Premium</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Semua Member Premium</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="search-form">
						<?php $this->renderPartial('_search',array(
							'model'=>$model,
						)); ?>
					</div><!-- search-form -->		
					<div class="clearfix"></div>
					<?php 	
					$arrayDataProvider=new CArrayDataProvider($memberPremium, array(
						'keyField'=>'id_member_premium',
						'pagination'=>array(
							'pageSize'=>10,
							),
					));
					$this->widget('zii.widgets.grid.CGridView', array(
						'id'=>'users-grid',
						'itemsCssClass'=>'table table-hover table-striped table-bordered table-condensed',
						'dataProvider' => $arrayDataProvider,
						
						// 'ajaxUrl'=> Yii::app()->request->getUrl(),
						'columns' => array(
							array(
								'header'=>'No.',
								'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
							),
							array(
								'name' => 'Nama Nengkap',
								'type' => 'raw',
								'value' => 'CHtml::encode($data["nama_lengkap"])'
							),
							array(
								'name' => 'Nama Perusahaan',
								'type' => 'raw',
								'value' => 'CHtml::encode($data["nama_perusahaan"])'
							),
							array(
								'name' => 'Status',
								'type' => 'raw',
								'value' => 'CHtml::encode($data["status"])== 1 ? "<span class=\'label label-success\'>Aktif</span>":"<span class=\'label label-danger\'>Tidak Aktif</span>"'
							),
							array(
								'name' => 'Action',
								'type' => 'raw',
								'value' => '"<a class=\'\' title=\'Lihat Tipe Agen\' href=\'".Yii::app()->baseUrl."/MemberPremium/tipeAgen/".$data[\'id_member_premium\']."\' ><i class=\'fa fa-fw fa-eye\'></i> Jenis Tipe</a>"'
							),
						),
					)); 
					?>
				</div>
			</div>
		</div>	
	</div>			
</section>
				
