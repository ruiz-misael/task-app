<template>
	<div>
		<h3>Agregar Tareas</h3>
		<form>
			<input type="text" placeholder="Nombre" class="form-control mb-2">
			<input type="text" placeholder="Descripcion" class="form-control mb-2">
			<button class="btn btn-info pul-right" type="submit">Agregar</button>
		</form>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				tareas:[],
				tarea:{nombre:"",descripcion:""}
			}
		}
	}
</script>