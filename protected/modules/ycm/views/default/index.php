<?php
/* @var $this DefaultController */
/* @var $models array */
    $baseUrl = Yii::app()->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCoreScript('jquery');
    $cs->registerCssFile($baseUrl.'/css/ycm/index.css');
    $this->pageTitle=Yii::t('YcmModule.ycm','Administration');
    $this->beginWidget('bootstrap.widgets.TbHeroUnit'); ?>
    <?php foreach ($models as $model): 
        if
        (
            $this->module->getAdminName($model) != 'Productos'  && 
            $this->module->getAdminName($model) != 'ContactForm' && 
            $this->module->getAdminName($model) != 'LoginForm' 
        ):
    ?>
        <div class="btn-toolbar">
        <?php
//        echo $this->module->getAdminName($model);
            $buttons=array();
            $download=false;
            $downloadItems=array();

            array_push($buttons,array(
                    'type'=>'primary',
                    'label'=>$this->module->getAdminName($model),
                    'url'=>$this->createUrl('model/list',array('name'=>$model)),
            ));
            if ($this->module->getHideCreate($model) === false) {
                    array_push($buttons,array(
                            'label'=>Yii::t('YcmModule.ycm','Agregar'),
                            'url'=>$this->createUrl('model/create',array('name'=>$model)),
                    ));
            }
            array_push($buttons,array(
                    'label'=>Yii::t('YcmModule.ycm','Ver'),
                    'url'=>$this->createUrl('model/list',array('name'=>$model)),
            ));

            if ($this->module->getDownloadExcel($model)) {
                    $download=true;
                    array_push($downloadItems,array(
                            'label'=>Yii::t('YcmModule.ycm','Excel'),
                            'url'=>$this->createUrl('model/excel',array('name'=>$model)),
                    ));
            }
            if ($this->module->getDownloadMsCsv($model)) {
                    $download=true;
                    array_push($downloadItems,array(
                            'label'=>Yii::t('YcmModule.ycm','MS CSV'),
                            'url'=>$this->createUrl('model/mscsv',array('name'=>$model)),
                    ));
            }
            if ($this->module->getDownloadCsv($model)) {
                    $download=true;
                    array_push($downloadItems,array(
                            'label'=>Yii::t('YcmModule.ycm','CSV'),
                            'url'=>$this->createUrl('model/csv',array('name'=>$model)),
                    ));
            }

            $this->widget('bootstrap.widgets.TbButtonGroup',array(
                    'type'=>'', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'buttons'=>$buttons,
            ));

            if ($download) {
                    $this->widget('bootstrap.widgets.TbButtonGroup',array(
                            'type'=>'',
                            'buttons'=>array(
                                    array('label'=>Yii::t('YcmModule.ycm',
                                            'Download {name}',
                                            array('{name}'=>$this->module->getPluralName($model))
                                    )),
                                    array('items'=>$downloadItems),
                            ),
                    ));
            }
            ?>
        </div>
    <?php endif; endforeach; ?>
<?php $this->endWidget(); ?>