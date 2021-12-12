
function required()
{
var empt = document.f.name.value;
var empt1 = document.f.mail.value;
var empt2 = document.f.phone.value;

var empt3 = document.f.subject.value;
var empt4 = document.f.extraction.value;

if (empt == "")
{
alert("Please input a Value");
return false;

}
if (empt1 == "")
{
alert('Mail');
return false;

}
if (empt2 == "")
{
alert("phone");
return false;

}
if (empt3 == "")
{
alert("subject");
return false;

}
if (empt4 == "")
{
alert("extrac");
return false;

}
}