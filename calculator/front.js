class Calculator{
    constructor(calcDom){
        this.calc = calcDom;
        this.term = '';
        this.input = this.getInput();
        this.nums = this.getNums();
        this.operations = this.getOperations();
        this.isAsking = true;
        this.start();
    }
    clear(){
        this.term = '';
        this.updateInput()
    }
    getInput(){
        let input = this.calc.children.item(0);
        console.log(typeof input.value);
        return input;
    }
    getNums(){
        let nums = this.calc.children.item(1).children.item(0);
        console.log(nums);
        return nums;
    }
    getOperations(){
        let ops = this.calc.children.item(1).children.item(1);
        console.log(ops);
        return ops;
    }
    start(){
        for(let btn of this.nums.children){
            btn.addEventListener('click',(ev)=>{this.type(ev)});
        }
        for(let btn of this.operations.children){
            btn.addEventListener('click',async (ev)=>{await this.typeOps(ev)});
        }
    }
    type(ev){
        ev.preventDefault;
        if(this.isAsking == false) {
            this.clear();
            this.isAsking = true;
        }
        if(this.term == '0' || this.term=='(0'){
            switch(ev.target.getAttribute('data-value')){
                case '0':
                    return;
                    
                default:
                    break;
            }
        }
        this.term += ev.target.getAttribute('data-value');
        this.updateInput();
    }
    allowedToClose(){
        const str = this.term;
        const countOfOpen = str.split('(').length - 1;
        const countOfClose = str.split(')').length - 1;
        if(countOfOpen == countOfClose) return false;
        return true;
    }
    async typeOps(ev){
        ev.preventDefault;
        if(this.isAsking == false) this.clear();
        if(this.term == ''){
            switch(ev.target.getAttribute('data-value')){
                case ')':
                    return;
                    break;
            }
        }
        if((this.term.endsWith('+') || this.term.endsWith('-') || this.term.endsWith('*') || this.term.endsWith('/')) && (ev.target.getAttribute('data-value') ==  '(')){
            this.term += ev.target.getAttribute('data-value');
            this.updateInput();
            return;
        } 
        if(this.term.endsWith('+') || this.term.endsWith('-') || this.term.endsWith('*') || this.term.endsWith('/')) return;
        switch (ev.target.getAttribute('data-value')){
            case 'C':
                this.clear();
                break;
            case '=':
                if((this.term.split('(').length - 1) > (this.term.split(')').length - 1)) return alert('У вас есть одна незакрытая скобка')
                if(this.term.endsWith('(')){
                    let a = this.term.split('');
                    a.pop();
                    this.term = a.join('');
                    alert('Вы не можете заканчивать выражение на "("');
                    this.updateInput();
                    return;
                }
                this.term = await this.getData();
                this.updateInput();
                this.isAsking = false;
                break;
            case ')':
                if(this.allowedToClose()) this.term += ev.target.getAttribute('data-value');
                break; 
            default:
                this.term += ev.target.getAttribute('data-value');
                break;
        }
        this.updateInput();
    }

    updateInput(){
        this.input.value = this.term;
    }
    async getData(){
        let data = {
            term:this.term,
        }
        let req = await fetch('http://localhost/PHP-Karlin_Petr/calculator/back.php',{
            method:'POST',
            headers:{
                'Content-Type':'application/json'
            },
            body:JSON.stringify(data),
        })
        let res = await req.json();  
        return (res.term).toString();
    }



}

const calc = new Calculator(document.querySelector('#calculator'));

