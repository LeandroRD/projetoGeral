
<select name="combo_familia" class="form-control" >
    <?php if($fornecedor['servico']== 0):?>
        <option value="0" selected>Nenhuma</option>
    <?php else:?>
        <option value="0" >Nenhuma</option>
    <?php endif;?>
        <?php foreach($familia_servicos as $servicos):?>
            <?php if($fornecedor['servico'] == $servicos['id_familia_servicos']):?>
                <option value="<?php echo $servicos['id_familia_servicos'] ?>" selected><?php echo $servicos['designacao_servicos']?></option>
            <?php else:?>
                <option value="<?php echo $servicos['id_familia_servicos'] ?>"><?php echo $servicos['designacao_servicos']?></option>
            <?php endif;?>                               
        <?php endforeach;?>
</select>


<select name="" class="form-control" >
    <?php if($fornecedor['UF']== 0):?>
        <option value="0" selected>Nenhuma</option>
    <?php else:?>
        <option value="0" >Nenhuma</option>
    <?php endif;?>
        <?php foreach($select_uf as $cada_uf):?>
            <?php if($fornecedor['UF'] == $cada_uf['id_uf']):?>
                <option value="<?php echo $cada_uf['id_uf'] ?>" selected><?php echo $cada_uf['UF']?></option>
            <?php else:?>
                <option value="<?php echo $cada_uf['id_uf'] ?>"><?php echo $cada_uf['UF']?></option>
            <?php endif;?>                               
        <?php endforeach;?>
</select>
