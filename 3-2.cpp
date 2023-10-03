#include <iostream>
using namespace std;

int main() {

    string matkul[3], NIM, NAMA, huruf[3];
    float nilai[3], sks[3], ttl_sks = 0, ttl_jml = 0, bobot[3];
    float IPK;

    cout << "\n=======================\nProgram Entry Nilai Matakuliah\n-----------------------" << endl;

    cout << "NIM: ";
    cin >> NIM;

    cout << "NAMA: ";
    cin.ignore();
    getline(cin, NAMA);

    for (int i = 0; i < 3; i++) {
        cout << "Mata kuliah " << i + 1 << ": ";
        cin >> matkul[i];

        cout << "SKS " << i + 1 << ": ";
        cin >> sks[i];

        cout << "Masukkan Nilai " << i + 1 << ": ";
        cin >> nilai[i];

        // Hitung bobot
        bobot[i] = (nilai[i] >= 75) ? 4 : ((nilai[i] >= 70) ? 3.5 : ((nilai[i] >= 65) ? 3 : ((nilai[i] >= 60) ? 2.5 : ((nilai[i] >= 55) ? 2 : 1))));

        // Hitung huruf
        huruf[i] = (nilai[i] >= 85) ? "A" : ((nilai[i] >= 75 && nilai[i] < 85) ? "AB" : ((nilai[i] >= 70 && nilai[i] < 75) ? "B" : ((nilai[i] >= 65 && nilai[i] < 70) ? "BC" : ((nilai[i] >= 55 && nilai[i] < 65) ? "C" : ((nilai[i] >= 45 && nilai[i] < 55) ? "D" : "E")))));

        // Hitung total SKS dan total jumlah
        ttl_sks += sks[i];
        ttl_jml += bobot[i] * sks[i];
    }

    cout << "\n***********************\nTranskrip Nilai\n**********************" << endl;

    cout << "NIM : " << NIM << "   " << "NAMA : " << NAMA << "\n" << endl;

    cout << "Matakuliah    Huruf    Bobot     SKS     Jumlah" << endl;

    for (int i = 0; i < 3; i++) {
        cout << matkul[i] << "         " << huruf[i] << "         " << bobot[i] << "         " << sks[i] << "      " << bobot[i] * sks[i] << endl;
    }

    cout << "\nJumlah SKS : " << ttl_sks << endl;
    cout << "\nJumlah Total : " << ttl_jml << endl;

    IPK = ttl_jml / ttl_sks;
    cout << "IPK : " << IPK << endl;

    return 0;
}
