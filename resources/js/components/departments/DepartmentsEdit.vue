<template>
    <div class="mt-2 mb-6 text-sm text-red-600" v-if="errors !== ''">
        {{ errors }}
    </div>
    <div class="flex place-content-end mb-4">
        <div class="px-4 py-2 text-white bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
            <router-link :to="{ name: 'departments.index' }" class="text-sm font-medium">Back to Dashboard</router-link>
        </div>
    </div>
    <form class="space-y-6" @submit.prevent="saveDepartment">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="department.name">
                </div>
            </div>

            <div>
                <label for="slug_name" class="block text-sm font-medium text-gray-700">Slug Name</label>
                <div class="mt-1">
                    <input type="text" name="slug_name" id="slug_name"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="department.slug_name">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <input type="text" name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="department.description">
                </div>
            </div>
            <div>
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent</label>
                <div class="mt-1">
                    <input type="text" name="parent_id" id="parent_id"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="department.parent_id">
                </div>
            </div>

            <div>
                <label for="cover_image_path" class="block text-sm font-medium text-gray-700">Cover Image Path</label>
                <div class="mt-1">
                    <input type="text" name="cover_image_path" id="cover_image_path"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="department.cover_image_path">
                </div>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">Upload Image</label>
                <div class="mt-1">

                    <input type="file" id="file" ref="file" name="file" class="form-control"
                           @change="handleImageSelected">
                </div>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Update
        </button>
    </form>
</template>

<script>
    import useCompanies from '../../composables/departments'
    import {onMounted} from 'vue';

    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },

        setup(props) {
            const {errors, department, updateDepartment, getDepartment} = useCompanies()

            onMounted(() => getDepartment(props.id))

            const saveDepartment = async () => {
                await updateDepartment(props.id)
            }

            return {
                errors,
                department,
                saveDepartment
            }
        }
    }
</script>
