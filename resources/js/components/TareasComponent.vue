<template>
	<div>
		<h3 class="text-primary" v-if="edicionTarea">EDITAR TAREAS</h3>
		<h3 class="text-primary" v-else="edicionTarea">AGREGAR TAREAS</h3>
		<form @submit.prevent="actualizar(tarea)" v-if="edicionTarea">
			<input type="text" placeholder="Nombre" v-model="tarea.nombre" class="form-control mb-2">
			<input type="text" placeholder="Descripcion" v-model="tarea.descripcion" class="form-control mb-2">
			<input type="date" placeholder="Fecha" v-model="tarea.fecha" class="form-control mb-2">
			<button class="btn  btn-primary float-fight" type="submit">Guardar</button>
		</form>

		<form @submit.prevent="agregar" v-else>
			<input type="text" placeholder="Nombre" v-model="tarea.nombre" class="form-control mb-2">
			<input type="text" placeholder="Descripcion" v-model="tarea.descripcion" class="form-control mb-2">
			<input type="date" placeholder="Fecha" v-model="tarea.fecha" class="form-control mb-2">
			<button class="btn  btn-primary float-fight" type="submit">Agregar</button>
		</form>
		<br>
		<hr class="my-3" style="border:1px solid #0D6EFD;">
		<h3 class="text-primary" v-if="tareas">TAREAS PENDIENTES</h3>
		<ul class="list-group" style="border:1px solid #0D6EFD;" v-if="tareas">
			<li v-for="(item, index) in tareas"  class="list-group-item">
				<div class="d-flex justify-content-between">
					<div class="col-lg-10"><h4>{{ item.nombre }}</h4>
						<i> {{moment(item.fecha).format('dddd, Do MMMM YYYY')}}</i>

					</div>
					<div class="col-lg-2">
						<span  v-if=" item.estatus == 1" class=" badges p-1 text-warning float-fight" style="border-radius:5px;">PENDIENTE</span>
						<span v-else class=" badges text-primary p-1 text-white float-fight" style="border-radius:5px;">REALIZADA</span>		
					</div>
				</div>
				<div class="d-flex justify-content-between">
					
					<div class="col-lg-12">{{ item.descripcion }}</div>
				</div>
				<div class="d-flex justify-content-between">
					<div class="col-lg-9"><button class="btn  btn-primary" type="submit" @click="finalizarTarea(index,item)">Finalizar</button></div>
					<div class="col-lg-4" >
						<button class="btn  btn-info float-fight" 
						@click="editarTarea(index,item)"type="submit">Editar</button>
						<button class="btn  btn-danger float-fight" type="submit"
						@click="eliminarTarea(index,item)">Eliminar</button>
					</div>
				</div>
			</li>
		</ul>
	</div>
</template>

<script>
	export default{
		data(){

			return{
				tareas:[],
				tarea:{nombre:"",descripcion:"",fecha:"",id:"",index:""},
				 time: new Date(),
				 edicionTarea: false
			}
		},
		created(){
			axios.get('tareas').then(response=>{
					this.tareas=response.data;
				});

		},
		methods:{
			agregar(){

				if(this.tarea.nombre.trim()=== "" ||
					this.tarea.descripcion.trim()=== "" ||
					this.tarea.fecha.trim()=== ""){
					alert("Debe completar todos los campos");
					return;
				}

				// console.log(this.tarea.nombre,this.tarea.descripcion,this.tarea.fecha);
		const params={
			nombre:this.tarea.nombre,
			descripcion:this.tarea.descripcion,
			fecha:this.tarea.fecha
		}

		this.tarea.nombre="";
		this.tarea.descripcion="";
		this.tarea.fecha="";

				axios.post('tareas_store',params)
				.then(response=>{
					this.tareas.push(response.data);
				});
			},
			editarTarea(index,item){

				this.edicionTarea=true;
				this.tarea.nombre=item.nombre;
		this.tarea.descripcion=item.descripcion;
		this.tarea.fecha=item.fecha;
		this.tarea.id=item.id;
		this.index=index;

		
	

			},actualizar(item){
				var datos={
			nombre:this.tarea.nombre,
			descripcion:this.tarea.descripcion,
			fecha:this.tarea.fecha
		}

	
		axios.post('tareas_update/'+item.id,datos)

				.then(response=>{

			this.tareas=response.data;	
			this.tarea.nombre="";
		this.tarea.descripcion="";
		this.tarea.fecha="";		
					
				});
			
		

				this.edicionTarea=false;
				
			},

		eliminarTarea(index, item){
	

				axios.get('/tareas_delete/'+item.id)
				.then(()=>{
					this.tareas.splice(index,1);
				});
			
			
		}

		}	
	}
</script>