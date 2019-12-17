// Cookie Consent scripting
import 'cookieconsent';

window.addEventListener("load", function(){
  window.cookieconsent.initialise({
    "palette": {
      "popup": {
        "background": "#ffffff",
        "text": "#000000"
      },
      "button": {
        "background": "#000000",
        "text": "#ffffff"
      }
    },
    "content": {
      "message": "This website uses cookies to improve your experience. By using or registering on any portion of this site, you agree to our privacy policy.",
      "dismiss": "Accept",
      "link": "Read More",
      // ! Replace this with your Privacy Policy URL
      "href": "### YOUR PRIVACY POLICY URL ###"
    }
  })
});
