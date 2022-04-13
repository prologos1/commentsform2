class Commentsvalid {
  constructor (name, email, message) {
   this.name = name;
   this.email = email;
   this.message = message;
  }

  isValidMessage()  {
    return (this.message.length > 4) ? true : false;
  }
  isEmptyName()  {
    return (this.name.length > 2) ? true : false;
  }
  
  isValidEmailAddress(emailAddress) {
	const pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z\s]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
	}
}
