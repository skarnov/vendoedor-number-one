<select name="category_id" class="span4 typeahead" id="category_id">
<?php foreach($select_category as $v_category){ ?>
	<option value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>
	<?php }?>
</select>