@extends('layout.app')
@section('content')
    <div class='edit-profile'>
        <h2 class="heading">Добавить статья</h2>
        <form class='form' id='form' action="{{route('article.store')}}" method='POST' enctype='multipart/form-data'>
            @csrf
            @method('POST')
            <ul class="form__list">
                <li class="form__item">
                    <label class='form__label' for="title">Титул:</label>
                    <input class='form__input @error('title') is-invalid @enderror' id='title' type="text" name="title">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__label' for="text">Текст:</label>
                    <textarea class="form__input @error('text') is-invalid @enderror" id="text" name="text" rows="3">

                    </textarea>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__label' for="user">Автори:</label>
                    <select class="form__input select2" name="users[]" multiple="" data-select2-id="1" tabindex="-1" aria-hidden="true" >
                        @foreach (DB::table('users')->get() as $item)
                            <option value="{{ $item->id }}" {{--{{ (in_array($item->id,$array)) ? 'selected' : '' }}--}}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('user')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <button class='form__button' type="submit">Отправить</button>
                </li>
            </ul>
        </form>
    </div>
@endsection
