<div id="users" class="tab-pane panel-primary active fade show">
	<h2>Tous les utilisateurs</h2>

	@foreach($users as $user)
		<div class="post-preview bordering">

			<div class="user_bar"><div><p>Id : <strong>{{ $user->id }}</strong></p></div>
			<strong>{{ $user->username }}</strong>
		</div>
		<div><p>Créé : {{ $user->created_at->diffForHumans() }}</p></div>

		<form method="POST" action="">

			<button type="submit" class="btn btn-danger btn-show-alert" name="user_nickname" value="{{ $user->nickname }}">Supprimer</button>
		</form>
	</div>
	<br>

@endforeach
</div>
