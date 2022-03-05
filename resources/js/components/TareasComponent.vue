<template>
	<div>
		<h3 class="text-primary">AGREGAR TAREAS</h3>
		<form @submit.prevent="agregar">
			<input type="text" placeholder="Nombre" v-model="tarea.nombre" class="form-control mb-2">
			<input type="text" placeholder="Descripcion" v-model="tarea.descripcion" class="form-control mb-2">
			<input type="date" placeholder="Fecha" v-model="tarea.fecha" class="form-control mb-2">
			<button class="btn btn-sm btn-primary pul-right" type="submit">Agregar</button>
		</form>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				tareas:[],
				tarea:{nombre:"",descripcion:"",fecha:""}
			}
		},
		methods:{
			agregar(){

				if(this.tarea.nombre.trim()=== "" ||
					this.tarea.descripcion.trim()=== "" ||
					this.tarea.fecha.trim()=== ""){
					alert("Debe completar todos los campos");
					return;
				}
				
				console.log(this.tarea.nombre,this.tarea.descripcion,this.tarea.fecha);
		const params={
			nombre:this.tarea.nombre,
			descripcion:this.tarea.descripcion,
			fecha:this.tarea.fecha
		}
				axios.post('notas_store',)
			}
		}
	}
</script>