<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <!-- 🌟 Tabella principale -->
    <table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
            <td align="center">
                <!-- 🎨 Tabella interna per il contenuto -->
                <table cellspacing="0" cellpadding="0" border="0" width="600">
                    <tr>
                        <td align="center" bgcolor="#ffffff" style="padding: 20px;">
                            <!-- 🚀 Titolo -->
                            <h2 style="color: #333333;">Un utente ha chiesto di lavorare con noi</h2>
                            <!-- 📝 Paragrafi per i dati dell'utente -->
                        
                            
                            <p style="color: #666666;">Nome: {{$user->name}}</p>
                            <p style="color: #666666;">Email: {{$user->email}}</p>
                            <p style="color: #666666;">{{$body}}</p>
                            <!-- 🛠️ Link per rendere l'utente revisore -->
                            <p style="color: #666666;">Se vuoi renderlo revisore, clicca qui: <a href="{{route('make.revisor',compact('user'))}}" style="color: #007bff; text-decoration: none;">Rendi revisore</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    
</body>
</html>
