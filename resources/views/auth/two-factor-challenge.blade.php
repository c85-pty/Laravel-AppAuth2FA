<x-guest-layout>
	
	<div class="mb-4 text-2xl font-bold text-gray-600">
		{{__('Verify code 2 FA')}}		
	</div>

	{{-- @if(session('status') == 'verification-link-sent')
		<div class="mb-4 font-medium text-sm text-green-600">
			{{__('A new verificatioin link has been sent to the email address you provided during registration.')}}
		</div>
	@endif --}}

	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


	<form method="POST" ACTION="{{ route('two-factor.login') }}">
		@csrf
		<div class="mt-4">
			<x-input-label for="code" :value="__('Code')"/>
			<x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required />
			<x-input-error :messages="$errors->get('code')" class="mt-2" /> 
		</div>
		<div class="flex items-center justify-end mt-4">
			<x-primary-button>
				{{__('Confirm')}}
			</x-primary-button>
		</div>
	</form>

	{{-- <form method="POST" action="{{ route('logout') }}">
		@csrf
		<button type="submit" class="underline text-sm text-gray-600 hover:test-gray-900 rounded-md focus:outline-none focus:ring-2">
			{{__('Log Out')}}
		</button>
	</form> --}}



</x-guest-layout>