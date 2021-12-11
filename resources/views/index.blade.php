<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Accept in-person payments</title>
    <meta name="description" content="A demo of an in-person payment on Stripe" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('global.css') }}">
    <script>
        var token_route = "{{ route('token') }}"
        var token_capture = "{{ route('capture') }}"
        var token_create = "{{ route('create') }}"
        console.log(token_route);
    </script>
    <script src="{{ asset('client.js') }} " defer></script>
    <script src="https://js.stripe.com/terminal/v1/"></script>
  </head>
  <body>
    <div class="container-fluid h-100">
      <div class="row h-100">
        <div class="col-sm-6 offset h-100">
          <div class="row title">Simulate reader pairing</div>
          <div class="row margin pad">
            <button id="discover-button">
              1. Discover readers
              <svg aria-hidden="true" height="16" width="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.293 2.709A1 1 0 0 1 6.71 1.293l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.416-1.416L10.884 8.3z" fill-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div class="row margin pad">
            <button id="connect-button">
              2. Connect to a reader
              <svg aria-hidden="true" height="16" width="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.293 2.709A1 1 0 0 1 6.71 1.293l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.416-1.416L10.884 8.3z" fill-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <hr/>
          <div class="row title">Simulate a transaction</div>
          <div class="row margin pad text">Enter an amount</div>
          <div class="row pad">
            <div class="">
              <input id="amount-input" type="text" value="2000">
            </div>
          </div>
          <div class="row margin pad">
            <button id="collect-button">
              3. Collect Payment
              <svg aria-hidden="true" height="16" width="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.293 2.709A1 1 0 0 1 6.71 1.293l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.416-1.416L10.884 8.3z" fill-rule="evenodd"></path>
              </svg>
            </button>
          </div>
          <div class="row margin pad">
            <button id="capture-button">
              4. Capture Payment
              <svg aria-hidden="true" height="16" width="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.293 2.709A1 1 0 0 1 6.71 1.293l6.3 6.3a1 1 0 0 1 0 1.414l-6.3 6.3a1 1 0 0 1-1.416-1.416L10.884 8.3z" fill-rule="evenodd"></path>
              </svg>
            </button>
          </div>
        </div>
        <div class="col-sm-6 h-100 log-col">
          <div class="row title">Logs</div>
          <div class="row">
            <div class="col-sm-12" id="logs"></div>
          </div>
        </div>
      </div>
    </div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
