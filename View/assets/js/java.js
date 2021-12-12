
function required(f)
{
var empt = f.name.value;
var empt1 = f.mail.value;
var empt2 = f.phone.value;

var empt3 = f.subject.value;
var empt4 = f.extraction.value;

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