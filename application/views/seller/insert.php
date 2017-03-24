<!DOCTYPE html>
<html>
<head>
	<title>Toko Poster</title>
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open_multipart("seller/seller_controller/create_poster"); ?>	
		<table>
			<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
			<tr>
				<td>Poster Name</td>
				<td><input type="text" name="poster_name"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>
				<td>Kategori</td>
				<td>
                <select name="id_category">
                    <option>...</option>
                <?php foreach($category as $res) { ?>
                    <option value="<?php echo $res->id ?>"><?php echo $res->category_name ?></option>
                <?php } ?>
                </select>
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="description"></textarea></td>
			</tr>
			<tr>
				<td>Upload Poster</td>
				<td><input type="file" name="picture"></td>
				<td><input type="hidden" name="date_in" value="<?php echo date('Y-m-d'); ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit"></td>
			</tr>
		</table>
	<?php echo form_close(); ?>
	</form>
</body>
</html>