<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ORMS</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/dist/img/res.svg">

</head>
<body>
<main>
<!-- #310693 -->
    <section class="form-section">
        <div class="form-wrapper" style="background: linear-gradient(90deg, #30376b 1%, #14af0b 50%, #30376b 99%);">
          <div style="background: linear-gradient(90deg, rgba(48,55,107,1) 22%, rgba(20,175,11,1) 50%, rgba(48,55,107,1) 78%);border: 4px solid rgba(4, 88, 0, 0.68);height:55px;">
                  <a href="{{ url('/') }}" class="brand-link reslogo" >
                  <center><font color="#fff" face="Georgia" weight="bolder" size="5"><b><font color="#ffca00">R</font>estaurant<font color="#ff0000ad">P</font><font color="#459fff">O</font><font color="#ff0000ad">S</font></b></font></center>
                  </a>
          </div>
        <center><h1 class=""><font color="#ffffff">{{ __('Welcome') }}</font></h1></center>
            <center>
                <p><font color="#ffffff">{{ __('Please Login To Your Account') }}</font></p>
            </center>
            <form method="POST" action="{{ route('login') }}" class="form">
                @csrf

                <div class="form-group">
                    <label>
                        <span class="sr-only">{{ __('Email Address') }}</span>
                        <input id="email" type="email" placeholder="Email" class="form-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                </div>

                <div class="form-group">
                    <label>
                        <span class="sr-only">{{ __('Password') }}</span>
                        <input id="password" type="password" placeholder="Password" class="form-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>
                </div>

                <!-- <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div> -->

                <div class="form-group">
                    <input type="submit" value="{{ __('Login') }}" class="form-submit">
                </div>

                <footer class="form-footer">
                    <!-- <div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="form-link">{{ __('Forgot Your Password?') }}</a>
                        @endif
                    </div> -->
                    <!-- <div>
                        Don't have an account?
                        <a href="{{ route('register') }}" class="form-link">{{ __('Register') }}</a>
                    </div> -->
                </footer>
            </form>
        </div>
    </section>
</main>
</body>
</html>

<style>
:root {
  --font-base: "Lato";
  --fs-700: 2.986rem;
  --fs-600: 2.488rem;
  --fs-500: 2.074rem;
  --fs-400: 1.728rem;
  --fs-300: 1.44rem;
  --fs-200: 1.2rem;
  --fs-100: 1rem;
  --fs-50: 0.833rem;

  --white: #ffffff;
  --grey-50: #f8fafc;
  --grey-100: #f1f5f9;
  --grey-200: #e2e8f0;
  --grey-300: #cbd5e1;
  --grey-400: #94a3b8;
  --grey-500: #64748b;
  --grey-600: #475569;
  --grey-700: #334155;
  --grey-800: #1e293b;
  --grey-900: #0f172a;
  --grey-950: #020617;

  --primary: #006ed8;
  --primary-50: hsl(209, 100%, 52%);

  --valid: #00d86c;
  --invalid: #d8002f;

  --text: var(--grey-500);
  --text-alt: var(--grey-900);
  --background: var(--grey-200);
  --background-alt: var(--grey-100);
  --background-shade: var(--grey-100);
}
/* 
@media (prefers-color-scheme: dark) {
  :root {
    --text: var(--grey-500);
    --text-alt: var(--grey-100);
    --background: var(--grey-900);
    --background-alt: var(--grey-800);
    --background-shade: var(--grey-700);
  }
} */


/*
Base
*/
* {
  box-sizing: border-box;
}


html {
  font-size: 100%;
}

html,
body,
main {
  height: 100%;
}

body {
  margin: 0;
  padding: 0;
  font-family: var(--font-base), sans-serif;
  font-weight: 400;
  line-height: 1.618;
  color: var(--grey-700);
}

h1,
h2,
h3,
h4,
h5,
h6 {
  margin-top: 2.25rem;
  margin-bottom: 1rem;
  line-height: 1.15;
  font-weight: 700;
  letter-spacing: -0.022em;
  color: var(--grey-900);
}

h1,
.h1 {
  font-size: var(--fs-600);
}

h2,
.h2 {
  font-size: var(--fs-500);
}

h3,
.h3 {
  font-size: var(--fs-400);
}

h4,
.h4 {
  font-size: var(--fs-300);
}

h5,
.h5 {
  font-size: var(--fs-200);
}

h6,
.h6 {
  font-size: var(--fs-100);
}

a {
  color: var(--primary);
  text-decoration: none;
}

a:hover {
  color: var(--primary-50);
  text-decoration: underline;
}


/* Page title */

.title {
  margin-top: unset;
  margin-bottom: 2rem;
  text-align: center;
}

/* Input defaults and validation */

input, select, textarea {
  width: 100%;
  padding: 0.75rem;
  font-size: var(--fs-100);
}

input:not([type="submit"]):user-valid {
  border: 1px solid var(--valid);
}

input:not([type="submit"]):user-invalid {
  border: 1px solid var(--invalid);
}

/* Form */

.form-section {
  background: linear-gradient(90deg, rgba(5,22,115,1) 10%, rgba(140,63,226,1) 50%, rgba(5,22,115,1) 90%);
  min-height: 100%;
  display: flex;
  padding: clamp(2rem, 2vw, 2rem);
}

.form-wrapper {
  width: 100%;
  padding: clamp(2rem, 2vw, 2rem);
  margin: auto;
  background-color: var(--background-alt);
  border-radius: 0.25rem;
}

.form-wrapper .title {
  color: var(--text-alt)
}

.form-group {
  margin-bottom: 1rem;
  flex-grow: 1;
  flex-shrink: 1;
}

.form-input {
  background-color: var(--background-shade);
  color: var(--text-alt);
  border: 0;
  border-radius: .25rem;
  box-shadow: 0 0 1px var(--text);
}

.form-link {
  color: var(--primary-50);
}

.form-submit {
  padding: 1rem;
  border: none;
  border-radius: 0.25rem;
  cursor: pointer;
  background-color: #3a0ca3;
  color: var(--white);
  transition: background-color cubic-bezier(0.445, 0.05, 0.55, 0.95) 0.3s;
}

.form-submit:hover {
  background-color: var(--primary-50);
}

.form-footer {
  margin-top: 2rem;
  color: var(--text)
}


@media screen and (min-width: 40rem) {

  .form-wrapper {
    max-width: 50ch;
  }

  .form-row {
    display: flex;
  }

  .form-row--inline {
    display: inline-flex;
  }

  .form-row>.form-group {
    margin-right: .5rem;
    margin-left: 0.5rem;
  }

  .form-row>.form-group:first-child {
    margin-left: unset;
  }

  .form-row>.form-group:last-child {
    margin-right: unset;
  }
}

/*
  Utility
*/
.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  margin: -1px;
  padding: 0;
  overflow: hidden;
  clip-path: inset(50%);
  border: 0;
  white-space: nowrap;
  visibility: hidden;
}
    </style>