package com.example.shop;

import org.ksoap2.SoapEnvelope;
import org.ksoap2.serialization.SoapObject;
import org.ksoap2.serialization.SoapSerializationEnvelope;
import org.ksoap2.transport.HttpTransportSE;

import android.os.Bundle;
import android.preference.PreferenceManager;
import android.app.Activity;
import android.content.Intent;
import android.content.SharedPreferences;
import android.content.SharedPreferences.Editor;
import android.view.Menu;
import android.view.View;
import android.widget.AdapterView;
import android.widget.AdapterView.OnItemClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;

public class ViewProduct extends Activity implements OnItemClickListener{
	EditText ed1;
	Button b1;
	ListView lv1;
	
	String namespace="urn:demo";
	String method="search";
	String soapaction="urn:demo/search";
	
	
	String method1="view";
	String soapaction1="urn:demo/view";
	
	public static int pos;
	
	public static String[]pid,pname,pqu,utime,price,mfd,exdate,t,brand;

	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_view_product);
		ed1=(EditText)findViewById(R.id.editText1);
		b1=(Button)findViewById(R.id.button1);
		lv1=(ListView)findViewById(R.id.listView1);
		lv1.setOnItemClickListener(this);
		
		try
		{
			SoapObject sop=new SoapObject(namespace,method1);
			SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
			sev.setOutputSoapObject(sop);
			
			HttpTransportSE htp=new HttpTransportSE(Login.url);
			htp.call(soapaction1, sev);
			
			String res=sev.getResponse().toString();
			//Toast.makeText(getApplicationContext(), res, Toast.LENGTH_LONG).show();
			String a[]=res.split("\\@");
			 pid=new String[a.length];
			 pname=new String[a.length];
			 pqu=new String[a.length];
			 utime=new String[a.length];
			 price=new String[a.length];
			 mfd=new String[a.length];
			 exdate=new String[a.length];
			 t=new String[a.length];
			 brand=new String[a.length];
			 
			 for(int i=0;i<a.length;i++)
			 {
				String k[]=a[i].split("\\#");
				pid[i]=k[0];
				pname[i]=k[1];
				pqu[i]=k[2];
				utime[i]=k[3];
				price[i]=k[4];
				mfd[i]=k[5];
				exdate[i]=k[6];
				t[i]=k[7];
				brand[i]=k[8];
			 }
			 
			 ArrayAdapter<String>ad=new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1,pname);
			 lv1.setAdapter(ad);
			
			
		}
		catch(Exception e)
		{
			Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
		}
		
		
		
		
		b1.setOnClickListener(new View.OnClickListener() {
			
			@Override
			public void onClick(View arg0) {
				// TODO Auto-generated method stub
				String type=ed1.getText().toString();
				
				try
				{
					SoapObject sop=new SoapObject(namespace,method);
					sop.addProperty("type",type);
					
					
					SoapSerializationEnvelope sev=new SoapSerializationEnvelope(SoapEnvelope.VER11);
					sev.setOutputSoapObject(sop);
					
					HttpTransportSE htp=new HttpTransportSE(Login.url);
					htp.call(soapaction, sev);
					
					String res1=sev.getResponse().toString();
					Toast.makeText(getApplicationContext(), res1, Toast.LENGTH_LONG).show();
					
					String a[]=res1.split("\\@");
					 pid=new String[a.length];
					 pname=new String[a.length];
					 pqu=new String[a.length];
					 utime=new String[a.length];
					 price=new String[a.length];
					 mfd=new String[a.length];
					 exdate=new String[a.length];
					 t=new String[a.length];
					 brand=new String[a.length];
					 
					 for(int i=0;i<a.length;i++)
					 {
						String k[]=a[i].split("\\#");
						pid[i]=k[0];
						pname[i]=k[1];
						 pqu[i]=k[2];
						 utime[i]=k[3];
						 price[i]=k[4];
						 mfd[i]=k[5];
						 exdate[i]=k[6];
						 t[i]=k[7];
						 brand[i]=k[8];
					 }
					 
					 ArrayAdapter<String>ad=new ArrayAdapter<String>(getApplicationContext(), android.R.layout.simple_list_item_1,pname);
					 lv1.setAdapter(ad);
					
					
				}
				catch(Exception e)
				{
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();	
				}
				
				
			}
		});
	}



	@Override
	public void onItemClick(AdapterView<?> arg0, View arg1, int arg2, long arg3) {
		// TODO Auto-generated method stub
		pos=arg2;
		Intent i=new Intent(getApplicationContext(),Vprodet.class);
		startActivity(i);
		
	}

	
}
