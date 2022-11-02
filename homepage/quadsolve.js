

function getroots{
    const a = window.prompt("Enter value of a");
    const b = window.prompt("Enter value of b");
    const c = window.prompt("Enter value of c");
    

    const d = (b*b) - (4*a*c);
    console.log(a, b, c);
    console.log(d);
    dBox.innerHTML = `d: ${d}`;

    
    if(d > 0){
        root1 = (-b + Math.sqrt(d)) / (2 * a);
        root2 = (-b - Math.sqrt(d)) / (2 * a);
        realUneq.style.opacity = 1;
        document.write("The roots of quadratic equation are ${root1} and ${root2}.");
    }

    else if(d == 0){
        root1 = root2 = -b / (2 * a);
       document.write("The roots of quadratic equation are ${root1} and ${root2}.");
    }


    else{
        unreal.style.opacity = 1;
       document.write("The roots of quadratic equation are not real.");
    }
}
