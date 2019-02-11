@extends('layouts.appmaster')
@section('title','Profile')

@section('content')
<body>
	<h2>Profle Successfully Created</h2>
	<h3><?= $profile->getTitle()?></h3>
	<br>
	<br>
	<div>
	<?= $profile->getDescription()?><br/>
	<?= $profile->getStatus()?><br/>
	<?= $profile->getSkills()?><br/>
	<?= $profile->getEmail()?><br/>
	<?= $profile->getPhoneNo()?><br/>
	</div>
	<button type="button">Home</button>
@endsection