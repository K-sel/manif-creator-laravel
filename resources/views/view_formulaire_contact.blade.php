@extends('template_contact')
@section('contenu')
    <br>
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-info text-white">Création de manifestation</div>
            <div class="card-body">
                <div>
                    <p>Attention, la manifestaions doit respecter certains critères :
                    <p>
                    <ul>
                        <li>La date de début doit être dans le futur (au moins demain).</li>
                        <li>La manifestation doit durer entre 3 et 5 jours.</li>
                        <li>Le lieu doit contenir au moins 3 lettres.</li>
                        <li>Le lieu doit commencer par une majuscule, suivie de minuscules.</li>
                    </ul>
                    <div>
                        <form method="POST" action="{{ url('/') }}" accept-charset="UTF-8">
                            @csrf
                            <div class="mb-3"> <label for="start">Date de début : </label>
                                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" name="start"
                                    type="date" value="{{ old('start') }}">
                                {!! $errors->first('start', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="mb-3"> <label for="end">Date de fin : </label>
                                <input class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" name="end"
                                    type="date" value="{{ old('end') }}">
                                {!! $errors->first('end', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="mb-3">
                                <label for="location">Lieu de la manifestation : </label>
                                <textarea class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}"
                                    placeholder="Saisissez au moins 3 caractères et commencez par une majuscule" name="location" rows="4">{{ old('location') }}</textarea>
                                {!! $errors->first('location', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <button class="btn btn-info float-end" type="submit">Envoyer !</button>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
