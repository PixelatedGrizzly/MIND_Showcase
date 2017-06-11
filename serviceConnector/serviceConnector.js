
class ServiceConnector {
    constructor(_address, _method, _data){
        this.data = _data;
        this.address = _address;
        this.method = _method;
        this.result = "";
    }

    sendRequest(){
        var jqxhr = $.ajax({
          url: this.address,
          async: true,
          data : this.data,
          method : this.method
        } )
  .done(function(res) {
    console.log(res.body);
  })
  .fail(function() {
    
  })
  .always(function() {

  });
    }
}
