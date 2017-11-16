/**
 * @copyright Copyright (c) 2017 Kai Schröer <git@schroeer.co>
 *
 * @author Kai Schröer <git@schroeer.co>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

import Axios from 'axios';

export class Service {
	protected headers: object;
	protected baseUrl: string;
	protected data: any[];

	constructor(baseUrl: string) {
		this.baseUrl = OC.generateUrl(baseUrl);
		this.headers = {
			'requesttoken': OC.requestToken,
			'OCS-APIREQUEST': 'true'
		};
	}

	find(id: number) {
		this.data.forEach((entry) => {
			if (entry.id === id) {
				return entry;
			}
		});
		throw new Error('Could not find an entry with the given id.');
	}

	getAll() {
		return this.data;
	}

	load() {
		return Axios.get(this.baseUrl, {
			headers: this.headers
		}).then((response) => {
			this.data = response.data;
			return response;
		}).catch((error) => {
			return Promise.reject(error.response);
		});
	}

	create(obj) {
		return Axios.post(this.baseUrl,
			{
				data: obj
			},
			{
				headers: this.headers
			}
		).then((response) => {
			this.data.push(response.data);
			return response;
		}).catch((error) => {
			return Promise.reject(error.response);
		});
	}

	update(obj) {
		return Axios.put(this.baseUrl + '/' + id,
			{
				data: obj
			},
			{
				headers: this.headers
			}
		).then((response) => {
			let index = this.data.indexOf(obj);
			this.data[index] = response.data;
			return response.data;
		}).catch((error) => {
			return Promise.reject(error.response);
		});
	}

	remove(id: number) {
		return Axios.delete(this.baseUrl + '/' + id,
			{
				headers: this.headers
			}
		).then((response) => {
			let entry = this.find(response.data.id);
			let index = this.data.indexOf(entry);
			this.data.splice(index, 1);
			return response.data;
		}).catch((error) => {
			return Promise.reject(error.response);
		});
	}
}
