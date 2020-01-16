class Graph{
    constructor(canvas){
        this.canvas = canvas;
        this.ctx = this.canvas.getContext("2d");
    }
    animateGraph(persent){
        let c = 0;
        clearInterval(this.t);
        this.t = setInterval((e)=>{
            c += persent / (2000/60);
            if(c >= persent){
                c = persent;
                clearInterval(this.t);
            }
            this.ctx.clearRect(0,0,this.canvas.width, this.canvas.height);
            if(this.canvas.width == this.canvas.height){
                this.circleGraph(c);
            } else{
                this.blockGraph(c);
            }
        }, 2000/60)
    }
    circleGraph(persent){
        this.ctx.fillStyle="#ddd";
        this.ctx.beginPath();
        this.ctx.arc(this.canvas.width / 2, this.canvas.height / 2, this.canvas.width * 0.5, -Math.PI / 2, Math.PI * 3/2);
        this.ctx.closePath();
        this.ctx.fill();

        this.ctx.fillStyle="#00aaff";
        this.ctx.beginPath();
        this.ctx.moveTo(this.canvas.width / 2, this.canvas.height / 2);
        this.ctx.arc(this.canvas.width/ 2, this.canvas.height/ 2, this.canvas.width * 0.5, -Math.PI / 2, -Math.PI / 2 + (persent *  Math.PI * 2 / 100));
        this.ctx.closePath();
        this.ctx.fill();

        this.ctx.fillStyle="#fff";
        this.ctx.beginPath();
        this.ctx.arc(this.canvas.width / 2, this.canvas.height / 2, this.canvas.width * 0.35, -Math.PI / 2, Math.PI * 3/2);
        this.ctx.closePath();
        this.ctx.fill();

        this.ctx.fillStyle="#000";
        this.ctx.font=`30px Arial`;
        this.ctx.textAlign="center";
        this.ctx.textBaseLine ="middle";
        this.ctx.fillText(`${Math.floor(persent)}%`, this.canvas.width / 2, this.canvas.height / 2);
    }
    blockGraph(persent){
        this.ctx.fillStyle="#ddd";
        this.ctx.beginPath();
        this.ctx.rect(0,0,this.canvas.width, this.canvas.height);
        this.ctx.closePath();
        this.ctx.fill();

        this.ctx.fillStyle="#00aaff";
        this.ctx.beginPath();
        this.ctx.rect(0,0, persent * this.canvas.width / 100, this.canvas.height);
        this.ctx.closePath();
        this.ctx.fill();

        this.ctx.fillStyle="#000";
        this.ctx.font="15px Arial";
        this.ctx.textAlign="center";
        this.ctx.textBaseLine="middle";
        this.ctx.fillText(`${Math.floor(persent)}%`, this.canvas.width / 2, this.canvas.height/ 2);
    }
}