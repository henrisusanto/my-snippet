interface IUserRepo {
	getUsers () : string
}

class HenriRepo implements IUserRepo {
	constructor() {}
	getUsers (): string {
		return 'henri'
	}
}

class SusantoRepo implements IUserRepo {
	constructor() {}
	getUsers (): string {
		return 'susanto'
	}
}

class UserController {
	private userRepo: IUserRepo
	
	constructor(userRepo: IUserRepo) {
		this.userRepo = userRepo
	}

	async handleGetUsers (): Promise<void> {
		const users = await this.userRepo.getUsers()
		console.log(users)
	}
}

let x = new UserController(new SusantoRepo())
x.handleGetUsers()