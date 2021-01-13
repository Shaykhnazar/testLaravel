@extends('layout.app')
@section('content')
    <div class='edit-profile'>
        <h2 class="heading">Добавить пользователь</h2>
        <form class='form' id='form' action="{{route('user.store')}}" method='POST' enctype='multipart/form-data'>
            @csrf
            @method('POST')
            <ul class="form__list">
                <li class="form__item">
                    <label class='form__label' for="nickname">Никнейм:</label>
                    <input class='form__input @error('nickname') is-invalid @enderror' id='nickname' type="text" name="nickname">
                    @error('nickname')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__label' for="name">Имя:</label>
                    <input class='form__input @error('name') is-invalid @enderror' id='name' type="text" name="name">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__label' for="surname">Фамилия:</label>
                    <input class='form__input @error('surname') is-invalid @enderror' id='surname' type="text" name="surname">
                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__inline-label' for="avatar">Аватар:</label>
                    <input class='form__inline-input @error('avatar') is-invalid @enderror' id='avatar' type="file" name="avatar" value='image/jpeg,image/png'>
                    @error('avatar')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__label' for="phone">Телефон:</label>
                    <input class='form__input @error('phone') is-invalid @enderror' id='phone' type="text" name="phone">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <div class="form__title">Пол:</div>
                    <label class='form__inline-label' for="male">Мужской</label>
                    <input class='form__inline-input @error('sex') is-invalid @enderror' name='sex' id='male' type="radio" value="true">
                    <label class='form__inline-label' for="female">Женский</label>
                    <input class='form__inline-input @error('sex') is-invalid @enderror' name='sex' id='female' type="radio" value="false">
                    @error('sex')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </li>
                <li class="form__item">
                    <label class='form__inline-label' for="show_phone">Я согласен получать email-рассылку</label>
                    <input class='form__inline-input @error('show_phone') is-invalid @enderror' id='show_phone' type="checkbox" name="show_phone">
                    @error('show_phone')
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
