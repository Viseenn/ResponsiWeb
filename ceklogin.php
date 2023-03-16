#include <iostream>
#include <fstream>
#include <iomanip>
#define max 100
#define true 1
#define false 0

using namespace std;

typedef struct typestack *typeptrs;
struct typestack{
	string nama, pesan[max];
	int nomeja, jumlah=0, nostruk=0, total=0, beli[max];
	typeptrs next;
};
typeptrs top, bottom;

typedef struct typequeue *typeptrq;
struct typequeue{
	string nama, pesan[max];
	int nomeja, jumlah=0, total=0, beli[max];
	typeptrq next;
};
typeptrq awal, akhir;

string menu[10] = {"Paracetamol","Bodrex","Bodrexin","Promag","Rohto","Combatrin sirup","Actifed","Ranitidine","Ultraflu","Kalpanax"};
int harga[10] = {4000,6000,5000,7500,20000,18000,40000,40000,4000,18000};
int nostruk=0, jumlahs=0;

void buat_stack(); 
int stack_kosong(); 
void buat_queue(); 
int queue_kosong(); 
void tambahs(); 
void enqueue(); 
void menurm(); 
void cetak_queue(); 
void proses(); 
void push(typeptrq IB); 
void dequeue(); 
void pop(); 
void cetak_stack(); 

int main(){ 
	int p, pilih;
	char ulang, ulang1, menu;
	string u, pass;
	
	buat_stack();
	buat_queue();
	
	menu:
	do{
		system("CLS");
		cout << " ==================================" << endl; //tampilan awal
		cout << " \t APOTEK SIAP SEDIA " << endl;
		cout << " ==================================" << endl;
		cout << " 1. Pembeli" << endl;
		cout << " 2. Kasir" << endl;
		cout << " 3. Keluar" << endl;
		cout << "\n Pilih : "; cin >> p;
		if(p==1){
			do{
				system("CLS");
				cout << " ================================== " << endl; //menu pembeli
				cout << " \t Menu Pembeli " << endl;
				cout << " ================================== " << endl;
				cout << " 1. Data Obat " << endl; 
				cout << " 2. Transaksi " << endl;
				cout << " 3. Melihat Antrean " << endl;
				cout << " 4. Keluar " << endl;
				cout << "\n Pilih : "; cin >> pilih;
				if(pilih == 1){
					system("CLS");
					menurm(); 
				}else if(pilih == 2){
					system("CLS");
					cout << " ==============================================" << endl;
					cout << " \t  Transaksi Pembelian Obat " << endl;
					cout << " ==============================================\n " << endl;
					enqueue();
				}else if(pilih == 3){
					system("CLS");
					cout << " =================================================" << endl;
					cout << " \t\tMelihat Antrean " << endl;
					cout << " =================================================\n " << endl;
					cetak_queue(); 
				}else if(pilih == 4){
					goto menu; 
				}else{
					cout << "\n Terjadi kesalahan dalam menginput! \n" << endl; 
				}
				cout << " Kembali ke menu? (y/n) : "; cin >> ulang; 
			}while(ulang == 'y' || ulang == 'Y');
		}else if(p==2){
			do{
				system("CLS");
				cout << " =============================================" << endl;
				cout << "   Selamat Datang Di Kasir Apotek Siap Sedia" << endl;
				cout << " =============================================" << endl;
				cout << " Username : "; cin >> u; 
				cout << " Password : "; cin >> pass;
				
				if(u == "admin" && pass == "admin"){ 
					cout << "\n\n =============================================" << endl;
					cout << " \t\t Login Berhasil " << endl;
					cout << " =============================================" << endl;
					cout << " " << system("pause");
					do{
						system("CLS");
						cout << " =========================================" << endl;
						cout << " \t\t Menu Kasir " << endl;
						cout << " =========================================" << endl;
						cout << " 1. Ketersediaan Struk " << endl;
						cout << " 2. Proses Pembayaran " << endl;
						cout << " 3. Cetak Struk " << endl;
						cout << " 4. Pengambilan Struk " << endl;
						cout << " 5. Keluar " << endl;
						cout << "\n Pilih : "; cin >> pilih;
						if(pilih == 1){
							system("CLS");
							cout << " =========================================" << endl;
							cout << "\t   Ketersediaan Struk " << endl;
							cout << " =========================================" << endl;
							tambahs(); 
						}else if(pilih == 2){
							system("CLS");
							cout << " =========================================" << endl;
							cout << "\t   Proses Pembayaran " << endl;
							cout << " =========================================" << endl;
							proses(); 
						}else if(pilih == 3){
							system("CLS");
							cout << " =========================================" << endl;
							cout << "\t\tCetak Struk " << endl;
							cout << " =========================================" << endl;
							cetak_stack(); 
						}else if(pilih == 4){
							system("CLS");
							cout << " =========================================" << endl;
							cout << "\t     Pengambilan Struk " << endl;
							cout << " =========================================" << endl;
							pop(); 
						}else if(pilih == 5){
							goto menu; 
						}else{
							cout << "\n Terjadi kesalahan menginput! \n" << endl; 
						}
						cout << " Kembali ke menu? (y/n) : "; cin >> ulang;
					}while(ulang == 'y' || ulang == 'Y');
				}else{
					cout << "\n\n =============================================" << endl; 
					cout << " \t\t Login Gagal! " << endl;
					cout << " =============================================" << endl;
					cout << "  Ulangi login? (y/n) : "; cin >> ulang1;
					cout << " ---------------------------------------------" << endl;
				}
			}while(ulang1 == 'y' || ulang1 == 'Y');
		}else if(p==3){
			exit(0); 
		}else{
			cout << "\n Terjadi kesalahan dalam menginput! " << endl; 
			cout << "\n Ingin menginput ulang? (y/n) : "; cin >> menu;
		}
	}while(menu == 'y' || menu == 'Y');
}

void buat_stack(){ 
	typeptrs NS;
	NS = NULL;
	top = NS;
	bottom = NS;
}

int stack_kosong(){
	if(top==NULL){
		return(true); 
	}else{
		return(false); 
	}
}

void buat_queue(){
	awal = new typequeue;
	awal = NULL;
	akhir = awal;
}

int queue_kosong(){
	if(awal==NULL){
		return(true);
	}else{
		return(false);
	}
}

void tambahs(){ //menambah struk
	int jumlah;
	char tambah;
	
	cout << "\n Jumlah struk yang tersedia : " << jumlahs << endl;
	cout << "\n Ingin menambah jumlah struk? (y/n) : "; cin >> tambah;
	cout << endl;
	if(tambah == 'y' || tambah =='Y'){
		cout << " Input jumlah struk     : "; cin >> jumlah;
		
		jumlahs += jumlah;
		cout << "\n Jumlah struk saat ini  : " << jumlahs << " lembar\n " << endl;
	}
}

void enqueue(){
	typeptrq NQ, bantu;
	int pesan, bnykpesan;
	bool sama=false;
	
	NQ = new typequeue;
	cin.ignore();
	cout << " Nama\t\t    : "; getline(cin, NQ->nama);
	do{
		cout << " No meja\t    : "; cin >> NQ->nomeja;
		if(!queue_kosong()){
			bantu = awal;
			while(bantu != NULL){
				sama = false;
				if(bantu->nomeja == NQ->nomeja){
					sama=true;
					cout << "\n No urut sudah diambil! \n Silakan input kembali \n" << endl;
				}
				bantu = bantu->next;
			}
		}
	}while(sama);
	
	cout << " Banyaknya pesanan  : "; cin >> bnykpesan;
	cout << " Input kodenya saja! " << endl;
	cout << " ----------------------------------------------" << endl;
	cout << endl;
	int total[bnykpesan];
	for(int i=0;i<bnykpesan;i++){
		cout << " Obat ke-" << i+1 << endl;
		cout << "\t Kode obat   : "; cin >> pesan;
		if(pesan != 0){
			NQ->pesan[i] = menu[pesan-1];
			cout << "\t Nama obat   : " << menu[pesan-1] << endl;
			cout << "\t Harga obat  : " << harga[pesan-1] << endl;
			cout << "\t Jumlah beli : "; cin >> NQ->beli[i];
			total[i] = harga[pesan-1]*NQ->beli[i];
			cout << "\t Total       : " << total[i] << endl;
			NQ->total += total[i];
			NQ->jumlah++;
		}
		cout << endl;
	}
	cout << " ==============================================" << endl;
	cout << "\n Total Pembayaran    : " << NQ->total << endl;
	cout << " ----------------------------------------------" << endl;
	cout << "              Transaksi Berhasil!" << endl;
	cout << " ----------------------------------------------" << endl;
	
	if(queue_kosong()){
		awal = NQ;
	}else{
		akhir->next = NQ;
	} 
	akhir = NQ;
	akhir->next = NULL;
}

void menurm(){
	
	cout << " \t\t  DATA OBAT " << endl;
	cout << " ----------------------------------------------" << endl;
	cout << "   No.       Nama Obat           Harga    " << endl;
	cout << " ----------------------------------------------" << endl;
	for(int i=0; i<10; i++){
		cout << setiosflags(ios::left) << "    " << setw(7) << i+1;
		cout << setiosflags(ios::left) << " " << setw(20) << menu[i];
		cout << setiosflags(ios::left) << " " << harga[i] << endl;
		cout << " ----------------------------------------------" << endl;
	}
}

void cetak_queue(){ 
	typeptrq bantu;
	string nama;
	int tunggu=0, i=0;
	
	cin.ignore();
	if(queue_kosong()){
		cout << "\n -------------------------------------------------" << endl;
		cout << " \t\tTidak ada antrean " << endl;
		cout << " -------------------------------------------------\n " << endl;
	}else{
		cout << " Masukan nama : "; getline(cin, nama);
		bool cek = false;
		bantu = awal;
		cout << "\n -------------------------------------------------" << endl;
		cout << setiosflags(ios::left) << "    " << setw(20) << "No";
		cout << setiosflags(ios::left) << "    " << "Nama" << endl;
		cout << " -------------------------------------------------" << endl;
		do{
			if(bantu->nama == nama){ //searching
				cek = true;
				tunggu = i++;
			}else{
				i++;
			}
			cout << setiosflags(ios::left) << "    " << setw(20) << i;
			cout << setiosflags(ios::left) << "    " << setw(7) << bantu->nama << endl;
			cout << " -------------------------------------------------" << endl;
			bantu = bantu->next;
		}while(bantu!=NULL);
		cout << endl;
		if(!cek){
			cout << " Data tidak ditemukan" << endl;
		}else if(tunggu > 0){
			cout << " Mohon menunggu " << tunggu << " antrean lagi " << endl;
		}else{
			cout << " Giliran Anda, Silahkan melakukan proses pembayaran" << endl;
		}
		cout << endl;
	}
}

void proses(){ 
	char menu;
	int bayar, kembali;
	
	if(jumlahs <= 0){
		cout << "\n Struk Habis \n" << endl;
	}else if(queue_kosong()){
		cout << "\n Tidak ada antrean \n" << endl;
	}else{
		cout << "\n Jumlah Struk  : " << jumlahs << endl;
		cout << " -----------------------------------------" << endl;
		cout << "\n No Urut  : " << awal->nomeja << endl;
		cout << " Nama     : " << awal->nama << endl;
		cout << " -----------------------------------------" << endl;
		cout << " Pesanan   " << endl;
		for(int i=0;i<awal->jumlah;i++){
			cout << " ";
			cout << setiosflags(ios::left) << "  " << setw(3) << i+1;
			cout << setiosflags(ios::left) << "  " << setw(25) << awal->pesan[i];
			cout << setiosflags(ios::left) << "  x" << awal->beli[i] << endl;
		}
		cout << " -----------------------------------------" << endl;
		cout << " Total    : " << awal->total << endl;
		cout << "\n Ingin melakukan pembayaran? (y/n) : "; cin >> menu;
		
		if(menu=='y' || menu=='Y'){
			cin.ignore();
			do{
				cout << "\n Nominal Diterima : "; cin >> bayar;
				if(bayar < awal->total){
					cout << " Uang tidak cukup " << endl;
				}
			}while(bayar < awal->total);
			kembali = bayar-awal->total;
			cout << " Kembalian        : " << kembali;
			cout << endl;
			cout << " -----------------------------------------" << endl;
			cout << "           Pembayaran Berhasil! " << endl;             
			cout << " -----------------------------------------" << endl;
			
			push(awal); 
			dequeue(); 
			jumlahs--; 
		}
	}
}

void push(typeptrq IB){ 
	typeptrs NS; 
	
	NS = new typestack;
	NS->nomeja = IB->nomeja;
	NS->nama = IB->nama;
	NS->jumlah = IB->jumlah;
	for(int i=0;i<IB->jumlah;i++){
		NS->pesan[i] = IB->pesan[i];
		NS->beli[i] = IB->beli[i];
	}
	NS->total = IB->total;
	NS->nostruk = nostruk++;
	
	if(stack_kosong()){
		top = NS;
	}else{
		bottom->next = NS;
	}
	
	bottom = NS;
	bottom->next = NULL;
}

void dequeue(){ 
	typeptrq hapus;
	
	hapus = awal; 
	awal = hapus->next;
	free(hapus); 
}

void cetak_stack(){ 
	int nomor;
	typeptrs atas, bawah, bantu;
	char cetak;
	
	if(stack_kosong()){
		cout << "\n Struk kosong \n" << endl;
	}else{
		bawah = top;
		atas = bottom;
		if(bawah != atas){
			do{
				bantu = bawah;
				while(bantu->next != atas){
					bantu=bantu->next;
				}
				atas = bantu;
			}while(bantu != bawah);
		}
		cout << " Masukan no urut : "; cin >> nomor;
		bawah = top;
		atas = bottom;
		if(bawah->nomeja == nomor){
			cout << " -----------------------------------------" << endl;
			cout << "\n No Struk : " << bawah->nostruk+1 << endl;
			cout << " No Urut  : " << bawah->nomeja << endl;
			cout << " Nama     : " << bawah->nama << endl;
			cout << " -----------------------------------------" << endl;
			cout << " Pesanan   " << endl;
			for(int i=0; i<bawah->jumlah; i++){
				cout << " ";
				cout << setiosflags(ios::left) << "  " << setw(3) << i+1;
				cout << setiosflags(ios::left) << "  " << setw(25) << bawah->pesan[i];
				cout << setiosflags(ios::left) << "  x" << bawah->beli[i] << endl;
			}
			cout << " -----------------------------------------" << endl;
			cout << " Total    : " << bawah->total << endl;
			cout << " -----------------------------------------" << endl;
			cout << " Ingin mencetak struk? (y/n) : "; cin >> cetak;
			if(cetak == 'y' || cetak=='Y'){
				cout << " -----------------------------------------" << endl;
				cout << "\t Struk berhasil dicetak! "<< endl;
				cout << " -----------------------------------------" << endl;
			}
		}else if(bawah != atas){
			do{
				if(atas->nomeja == nomor){
					cout << " -----------------------------------------" << endl;
					cout << "\n No Struk : " << atas->nostruk+1 << endl;
					cout << " No Urut  : " << atas->nomeja << endl;
					cout << " Nama     : " << atas->nama << endl;
					cout << " -----------------------------------------" << endl;
					cout << " Pesanan   " << endl;
					for(int i=0; i<atas->jumlah; i++){
						cout << " ";
						cout << setiosflags(ios::left) << "  " << setw(3) << i+1;
						cout << setiosflags(ios::left) << "  " << setw(25) << atas->pesan[i];
						cout << setiosflags(ios::left) << "  x" << atas->beli[i] << endl;
					} 
				}
				bantu = bawah;
				while(bantu->next != atas){
					bantu = bantu->next;
				}
				atas=bantu;
			}while(bantu != bawah);
			cout << " -----------------------------------------" << endl;
			cout << " Total    : " << atas->total << endl;
			cout << " -----------------------------------------" << endl;
			cout << " Ingin mencetak struk? (y/n) : "; cin >> cetak;
			if(cetak == 'y' || cetak=='Y'){
				cout << " -----------------------------------------" << endl;
				cout << "\t Struk berhasil dicetak! "<< endl;
				cout << " -----------------------------------------" << endl;
			}
		}else{
			cout << " Data tidak ditemukan" << endl;
		}
	}
}

void pop(){ 
	typeptrs hapus, bantu;
	char menu;
	
	if(stack_kosong()){
		cout << "\n Tidak ada struk \n" << endl;
	}else{
		bantu = top;
		hapus = bottom;
		cout << " -----------------------------------------" << endl;
		cout << "\n No Struk : " << hapus->nostruk+1 << endl;
		cout << " No Urut  : " << hapus->nomeja << endl;
		cout << " Nama     : " << hapus->nama << endl;
		cout << " -----------------------------------------" << endl;
		cout << " Pesanan    " << endl;
		for(int i=0; i<hapus->jumlah; i++){
			cout << " ";
			cout << setiosflags(ios::left) << "  " << setw(3) << i+1;
			cout << setiosflags(ios::left) << "  " << setw(25) << hapus->pesan[i];
			cout << setiosflags(ios::left) << "  x" << hapus->beli[i] << endl;
		}
		cout << " -----------------------------------------" << endl;
		cout << " Total   : " << hapus->total << endl;
		cout << " -----------------------------------------" << endl;
		cout << " Ingin mengambil struk tersebut? (y/n) : "; cin >> menu;
		if(menu == 'y' || menu=='Y'){
			if(hapus == top){
				top = NULL;
				bottom = NULL;
			}else{
				while(bantu->next != bottom){
					bantu=bantu->next;
				}
				bottom = bantu;
				bottom->next = NULL;
			}
			free(hapus);
			cout << " -----------------------------------------" << endl;
			cout << "             Struk telah diambil " << endl;	
			cout << " -----------------------------------------" << endl;	
		}
	}
}

