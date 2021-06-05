


<select name="combo_fornecedor" class="form-control" >
    <?php if($cotacao['id_for']== 0):?>
        <option value="0" selected>Nenhuma</option>
    <?php else:?>
        <option value="0" >Nenhuma</option>
    <?php endif;?>
        <?php foreach($fornecedores as $fornecedor):?>
            <?php if($cotacao['id_for'] == $fornecedor['id_for']):?>
                <option value="<?php echo $fornecedor['id_for'] ?>" selected><?php echo $fornecedor['razao_social']?></option>
            <?php else:?>
                <option value="<?php echo $fornecedor['id_for'] ?>" ><?php echo $fornecedor['razao_social']?></option>
            <?php endif;?>                               
        <?php endforeach;?>
</select>