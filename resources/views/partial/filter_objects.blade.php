<?php
$count_groups = count($obj_list);
$groups = array_keys($obj_list);
?>


@if(isset($obj_list) && $count_groups>0)
    @foreach($groups as $group)
        <div class="<?php
        if ($count_groups == 1) echo 'col-sm-12';
        elseif ($count_groups == 2) echo 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
        elseif ($count_groups == 3) echo 'col-xl-4 col-lg-6 col-md-6 col-sm-12';
        elseif ($count_groups >= 4) echo 'col-xl-4 col-lg-6 col-md-6 col-sm-12';
        ?>">
            <label class="font-weight-bold">{{$group}}</label>

            <div class="row">
                @foreach($obj_list[$group] as $object)
                    <div class="<?php
                    if ($count_groups == 1) echo 'col-xl-4 col-lg-6 col-md-6 col-sm-12';
                    elseif ($count_groups == 2) echo 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
                    elseif ($count_groups == 3) echo 'col-xl-6 col-lg-6 col-md-6 col-sm-12';
                    elseif ($count_groups >= 4) echo 'col-sm-12';
                    ?>">
                        <div class="checkbox-custom checkbox-primary" tyle="text-align: left">
                            <input id="{{'obj-'.+$object->id}}" name="obj-list[]" type="checkbox"
                                   value="{{$object->caption}}" data-id="{{$object->id}}"
                            <?php if (in_array($object->id,$obj_selected)) echo 'checked'; else echo ''  ?>>
                            <label for="{{'obj-'.+$object->id}}">{{$object->caption}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endif
