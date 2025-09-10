<div>
    <h3>{{ getAuthenticatedUserFullName(auth('web')->check() ? "web" : "admin") }} عزیز </h3>

    <div>
        <span>خوش آمدید به</span>
        <span>{{ env('APP_NAME') }}</span>
    </div>

    <div>
        <span>با نام کاربری</span>
        <span>{{ auth('web')->check() ? auth('web')->user()->email : auth('admin')->user()->email }}</span>
    </div>

    <div>
        <span>و رمز عبور</span>
        <span>{{ session('password') }}</span>
    </div>
</div>
