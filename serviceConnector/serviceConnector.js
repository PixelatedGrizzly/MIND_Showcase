class ServiceConnector {
  constructor(_address, _method, _data) {
    this.data = _data;
    this.address = _address;
    this.method = _method;
    this.result = "";

    this.maxAttempt = 3;
    this.tryCount = 0;
  }

  sendRequest() {
    var jqxhr = $.ajax({
        url: this.address,
        async: true,
        data: this.data,
        method: this.method,
        context: this,
        error: function(xhr, textStatus, errorThrown) {
          this.tryCount++;
          if (this.tryCount <= this.maxAttempt) {
            //try again
            console.log("Connection to " + this.address + " failed, next try in 3 seconds, " + (this.maxAttempt - this.tryCount) + " attempts left...");

            var that = this;
            setTimeout(function() {
              that.sendRequest();
            }, 3000);


            return;
          }
          return;

        }
      })
      .done(function(res) {
        console.log(res.body);
      })
      .always(function() {

      });
  }
}
