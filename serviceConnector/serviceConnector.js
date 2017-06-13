class ServiceConnector {
  constructor(_address, _method, _data, _authorization) {
    this.data = _data;
    this.address = _address;
    this.method = _method;
    this.authorization = _authorization;
    this.result = "";


    this.maxAttempt = 3;
    this.tryCount = 0;
  }

  sendRequest(callback){
    var jqxhr = $.ajax({
        url: this.address,
        //data: JSON.stringify(this.data),
        method: this.method,
        headers: {
      'Content-Type':'application/x-www-form-urlencoded'
        },
        //dataType: 'application/x-www-form-urlencoded',
        //beforeSend: function(xhr){xhr.setRequestHeader('Authorization', this.authorization);},
        context: this,
        error: function(xhr, textStatus, errorThrown) {
          console.log(errorThrown);
          return;
          this.tryCount++;
          if (this.tryCount <= this.maxAttempt) {
            //try again
            console.log("Connection to " + this.address + " failed, next try in 3 seconds, " + (this.maxAttempt - this.tryCount) + " attempts left...");

            var that = this;
            setTimeout(function() {
              that.sendRequest();
            }, 3000);
          }
          return;
        }
      })
      .done(function(res) {
        console.log("klmk");
        callback(res);
      })
      .always(function() {

      });
  }

  sendRequestRPC(callback) {
    var jqxhr = $.ajax({
        url: this.address,
        data: JSON.stringify(this.data),
        method: this.method,
        //dataType: 'jsonp',
        contentType: 'application/json-rpc',
        //beforeSend: function(xhr){xhr.setRequestHeader('Authorization', this.authorization);},
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
          }
          return;
        }
      })
      .done(function(res) {
        callback(res);
      })
      .always(function() {

      });
  }
}
