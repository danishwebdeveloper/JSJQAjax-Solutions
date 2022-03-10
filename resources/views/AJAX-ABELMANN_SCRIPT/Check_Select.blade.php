<?php
            $list = [
                '' => Yii::t('lom', 'choose action'),
                'renewed-1' => Yii::t('lom', 'AV verlängert: ja'),
                'renewed-0' => Yii::t('lom', 'AV verlängert: nein'),
                'expired-1' => Yii::t('lom', 'AV ausgelaufen: ja'),
                'expired-0' => Yii::t('lom', 'AV ausgelaufen: nein'),
                'reactivationstarted-1' => Yii::t('lom', 'Rückholung eingeleitet: ja'),
                'reactivationstarted-0' => Yii::t('lom', 'Rückholung eingeleitet: nein'),
                'reactivationfailed-1' => Yii::t('lom', 'Rückholung gescheitert: ja'),
                'reactivationfailed-0' => Yii::t('lom', 'Rückholung gescheitert: nein'),
                'reactivated-1' => Yii::t('lom', 'zurückgeholt: ja'),
                'reactivated-0' => Yii::t('lom', 'zurückgeholt: nein'),
            ];
            echo CHtml::dropDownList('clist', '', $list);
            ?>

//Projects foreach
   <?php foreach($projectends as $i => $projectend): ?>
                    <tr class="<?php echo ($i % 2 == 0)? 'even': 'odd' ?>">
                        <td><?php echo CHtml::checkBox('peid['.$projectend->id.']') ?></td>
                        <td><?php echo $projectend->renderProjectId($projectend); ?></td>
                        <td><?php echo $projectend->renderProjectName($projectend); ?></td>
                        <td><?php echo $projectend->getEmpName(); ?></td>
                        <td><?php echo $projectend->getPMName(); ?></td>
                        <td><?php echo $projectend->getKamName(); ?></td>
                        <td><?php echo $projectend->getAcquirerName(); ?></td>
                        <td><?php echo $projectend->renewal; ?></td>
                        <td><?php echo $projectend->projecttypeName; ?></td>
                        <td><?php echo $projectend->departmentName; ?></td>
                        <td><?php echo $projectend->start; ?></td>
                        <td><?php echo $projectend->end; ?></td>
                        <td><?php echo $projectend->renderPrevious($projectend); ?></td>
                        <td><?php echo $projectend->period; ?></td>
                        <td><?php echo $projectend->amount; ?></td>
                        <td><?php echo Projectend::renderTotal($projectend); ?></td>
                        <td><?php echo $projectend->renderCr($projectend); ?></td>
                        <td><?php echo $projectend->renderModification($projectend); ?></td>
                        <td><?php echo $projectend->renderCanceled($projectend); ?></td>
                        <td><?php echo $projectend->renderReactivated($projectend); ?></td>
                        <td><?php echo $projectend->renderRenewed($projectend); ?></td>
                    </tr>
                <?php endforeach; ?>


 <div class="alert displaynone col-sm-2" id="responseMsg"></div>
 <div class='alert alert-danger mt-2 d-none text-danger' id="err_file"></div>

 <input type="button" value="Update" id="updateBtn"/>
            <script>
                $(document).ready(function () {
                    $("#updateBtn").click(function () {
                        // var myCheckboxes = [];
                        // $('input[type=checkbox]').each(function () {
                        //     if ($(this).prop('checked')) {
                        //         myCheckboxes.push($(this).attr("value"));
                        //         // console.log($(this).prop('id'));
                        //     }
                        // });
                        var selectedValue = $('#clist').find(":selected").text();
                        var checkID = $('input[type=checkbox]').serializeArray();
                        // console.log(checkID);
                        var mydata = {
                            // myCheckboxes: myCheckboxes,
                            selectedValue: selectedValue,
                            checkID : checkID,
                        };
                        var options = {};
                        options.url = '<?php echo $this->createUrl('projectendsbak') ?>';
                        options.type = "POST";
                        // options.data = {datalist: mydata};
                        options.datatype = "json";
                         options.data = $('input[type=checkbox], #clist').serialize();
                        options.cache = false;
                        options.success = function (response) {
                            console.log(response);
                            response = JSON.parse(response);

                            $('#err_file').removeClass('d-block');
                            $('#err_file').addClass('d-none');

                            if(response.success == 1){

                                $('#responseMsg').removeClass("alert-danger");
                                $('#responseMsg').addClass("alert-success");
                                $('#responseMsg').html(response.message);
                                $('#responseMsg').show();
                        }
                            else if (response.success == 2){
                                // console.log("Hello")
                                $('#responseMsg').removeClass("alert-success");
                                $('#responseMsg').addClass("alert-danger");
                                $('#responseMsg').html(response.message);
                                $('#responseMsg').show();
                            }
                            else {
                                $('#err_file').text("Error response!!!");
                                $('#err_file').removeClass('d-none');
                                $('#err_file').addClass('d-block');
                            }
                        }
                        options.error = function () {
                            alert("Error while Request!");
                        };
                        $.ajax(options);
                    });
                });
</script>

{{-- CONTROLLER --}}

