class Commentsvalid {
  constructor (name, email, message) {
   this.name = name;
   this.email = email;
   this.message = message;
  }

  isValidMessage()  {
    return (this.message.length > 4) ? true : false;
  }
  isNotEmptyName()  {
    return (this.name.length > 2) ? true : false;
  }
  
  isValidEmail() {
	const pattern = /\S+@\S+\.\S+/;
	return pattern.test(this.email);
  }
}
