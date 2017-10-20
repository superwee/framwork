<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->e($title)?></title>
</head>
<body>
<style>
	th{
		border:solid #e00 1px;
	}
	td{
		border:solid #e00 1px;
		text-align: center;
	}
</style>
	<center><h1>welcome to my first diy framwork</h1></center>
	<hr/>
	<center>
		<table style='border:solid black 1px;width:60%;' cellspacing=0>
			<tr>
				<th>姓名</th>
				<th>年龄</th>
				<th>性别</th>
			</tr>
				<?php if(!empty($result)):?>
					<?php foreach($result as $v):?>
						<tr>
							<td><?=$this->e($v['username'])?></td>
							<td><?=$this->e($v['age'])?></td>
							<td><?=$this->e(empty($v['sex']) ? '女' : '男')?></td>
						</tr>
					<?php endforeach?>
				<?php else:?>
					<tr>
						<td colspan="3">暂没有数据</td>
					</tr>
				<?php endif?>
		</table>
	</center>
</body>
</html>