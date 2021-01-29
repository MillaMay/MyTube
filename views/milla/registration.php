<div id='formLoginDiv'>
    <form class='sign_in' method='$_POST'>
        <!--<span class='description_input'>Ваша дата рождения:</span>
        <p class='p_input'>
            <label>
                День: <input class='login_pass date_in' type='text' maxlength='2' placeholder='00' name='days' required>
            </label>
            <label>
            Месяц: <input class='login_pass date_in' type='text' maxlength='2' placeholder='00' name='months' required>
            </label>
            <label>
            Год: <input class='login_pass date_in' type='text'  maxlength='4' placeholder='0000' name='years' required>
            </label>
        </p>-->
        <p>
            <input class='login_pass' type='text' maxlength='15' name='nickname' placeholder='Ваше имя или никнейм (не более 15 символов)' required><br>
            <p class='description_input'>Загрузить аватарку:</p>
            <input class='login_pass file_in' type='file' name='channel_theme' required>
        </p>
        <p>
            <input class='login_pass' type='text' name='channel_title' placeholder='Название канала' required>
            <p class='description_input'>Загрузить тему канала: <br><span class='bad'>(необязательный параметр)</span></p>
            <input class='login_pass file_in' type='file' name='avatar'>
        </p>
        <p>
            <input class='login_pass' type='email' name='login' placeholder='Адрес электронной почты (логин)' required>
        </p>
        <p>
            <input class='login_pass' type='password' name='password' placeholder='Пароль' required>
        </p>
        <p>
            <input class='login_pass' type='password' name='replay_password' placeholder='Повторите пароль' required>
        </p>
        <p>
            <input class='submit_login' type='submit' name='' value='Далее'>
        </p>
        <p><!--Дата регистрации--></p>
    </form>
</div>