class ServiceConnector {
  constructor(_address, _method, _data) {
    this.data = _data;
    this.address = _address;
    this.method = _method;
    this.result = "";

    this.maxAttempt = 3;
  }

  sendRequest() {

    if (maxAttempt > 0) {
      var jqxhr = $.ajax({
          url: this.address,
          async: true,
          data: this.data,
          method: this.method
        })
        .done(function(res) {
          console.log(res.body);
        })
        .fail(function() {
          maxAttempt--;
          console.log("Connection to " + address + " failed, next try in 3 seconds, " + maxAttempt + " attempts left...");
          setTimeout(function(){ this.sendRequest() }, 3000);
        })
        .always(function() {

        });
    }
  }else {
    this.maxAttempt = 3;
  }
}
