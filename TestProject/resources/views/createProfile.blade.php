@extends('layouts.appmaster')
@section('title','Create Profile')

@section('content')
	<form action = "makeProfile" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter your Information Below</h2>
		<table>
			<tr>
				<td>Title: </td>
				<td><input type = "text" name = "title" /></td>
			</tr><br/>
			<tr> 
			<tr>
				<td>Description: </td>
				<td><input type = "text" name = "discription" /></td>
			</tr><br/>
			<tr>
				<td>Status: </td>
				<td><input type = "text" name = "status" /></td>
			</tr><br/>
			<tr> 
				<td>Skills: </td>
				<td><input type = "text" name = "skills" /></td>
			</tr><br/>
			<tr>
				<td>Email: </td>
				<td><input type = "text" name = "email" /></td>
			</tr>
			<tr>
				<td>Phone Number: </td>
				<td><input type = "text" name = "phoneno" /></td>
			</tr>
			<br/><br/>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Create" />
				</td>
			</tr>
		</table>
	</form>
@endsection