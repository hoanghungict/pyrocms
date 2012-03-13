<?php if (!empty($fields)): ?>

    <table class="table-list">
		<thead>
			<tr>
			    <th><?php echo lang('streams.label.field_name');?></th>
			    <th><?php echo lang('streams.label.field_slug');?></th>
			    <th><?php echo lang('streams.label.field_type');?></th>
			    <th><?php echo lang('pyro.actions');?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($fields as $field):?>
			<tr>
				<td><?php echo $field->field_name; ?></td>
				<td><?php echo $field->field_slug; ?></td>
				<td><?php echo $this->type->types->{$field->field_type}->field_type_name; ?></td>
				<td class="actions">
				
					<?php
					
						$all_buttons = array();
						
						foreach($buttons as $button)
						{
							$class = (isset($button['confirm']) and $button['confirm']) ? 'button confirm' : 'button';
							$all_buttons[] = anchor(str_replace('-entry_id-', $field->id, $button['url']), $button['label'], 'class="'.$class.'"');
						}
					
						echo implode('&nbsp;', $all_buttons);
						unset($all_buttons);
						
					?>			
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
    </table>

<?php echo $pagination['links']; ?>

<?php else: ?>
	<div class="no_data"><?php echo lang('streams.start.no_fields');?> <?php echo anchor('admin/streams/fields/add', lang('streams.start.add_one'), 'class="add"'); ?>.</div>
<?php endif;?>
