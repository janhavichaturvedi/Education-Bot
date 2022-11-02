function myFunction()
    {
        const a=parseInt(document.getElementById("vala").value);
    const b=parseInt(document.getElementById("valb").value);
    const c=parseInt(document.getElementById("valc").value);
    const discriminant = (b*b) - (4*a*c);
console.log(a, b, c);
console.log(discriminant);
if(discriminant > 0){
    root1 = (-b + Math.sqrt(discriminant)) / (2 * a);
    root2 = (-b - Math.sqrt(discriminant)) / (2 * a);
    let text='The roots of quadratic equation are ';
    let text1=root1.toFixed(2);
    let text2=' and ';
    let text3=root2.toFixed(2);
    text=text+text1+text2+text3;
    document.getElementById("text").innerHTML=text;
   // window.alert(text);}
    else if(discriminant == 0){
        root1 = root2 = -b / (2 * a);
        let text='The roots of quadratic equation are ';
    let text1=root1.toFixed(2);
    let text2=' and ';
    let text3=root2.toFixed(2);
    text=text+text1+text2+text3;
    document.getElementById("text").innerHTML=text;}
        //document.write("The roots of quadratic equation are ",root1,root2,);}
        else{
            let text='The roots of quadratic equation are not real.';
            document.getElementById("text").innerHTML=text;;
        }
    }
